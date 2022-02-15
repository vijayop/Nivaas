# numberplate detection using opencv library
import cv2
import easyocr
import mysql.connector
import datetime

platecascade = cv2.CascadeClassifier("haarcascade_russian_plate_number.xml")
minArea = 500
cap = cv2.VideoCapture(0)
count = 0
while True:
    success,img = cap.read()
    imgGray = cv2.cvtColor(img,cv2.COLOR_BGR2BGRA)
    numberplates = platecascade.detectMultiScale(imgGray,1.1,4)
    for(x,y,w,h) in numberplates:
        area = w * h
        if area> minArea:
            cv2.rectangle(img,(x,y),(x+w,y+h),(255,0,0),2)       # making a rectangle around the numberplater  # (255,0,0) is RGB color
            #cv2.putText(img,"Number Plate",(x,y-5),cv2.FONT_HERSHEY_COMPLEX,1,(0,0,255),2)         # here we are putting the detected text on the image
            imgRoi = img[y:y+h,x:x+w]
            cv2.imshow("ROI",imgRoi)    # displaying our region of interest
    cv2.imshow("Result",img)
    if cv2.waitKey(1) & 0xff == ord('s'):           # pressing s will save the detected number plate and end the infinite loop
        cv2.imwrite("image.jpg",imgRoi)
        # cv2.rectangle(img,(0,200),(640,300),(255,0,0),cv2.FILLED)
        # cv2.putText(img,"SCAN SAVED",(15,265),cv2.FONT_HERSHEY_COMPLEX,2,(0,255,255),2)  # after pressing s this message will be displayed
        # cv2.imshow("FINAL OUTPUT",img)
        # cv2.waitKey(500)
        break


# use easy ocr to read the text from the numberplate
numberplate = cv2.imread('image.jpg')
reader = easyocr.Reader(['en'])
result = reader.readtext(numberplate)

# Render result
text = result[0][-2]
print(text)


# Sending the numberplate text value to the database
conn = mysql.connector.connect(host="localhost", user="root", password="", database="nivaas")
cursor = conn.cursor()
now = datetime.datetime.now()
formatted_date = now.strftime('%Y-%m-%d %H:%M:%S')

cursor.execute("SELECT number_plate FROM vehicle WHERE number_plate = '"+ text +"'")
records = cursor.fetchall()
count = cursor.rowcount

if count > 0:
    cursor.execute('UPDATE vehicle SET departure_time= %s WHERE number_plate = %s',(formatted_date,text))
    conn.commit()
    records = cursor.fetchall()
else:
    cursor.execute('INSERT INTO `vehicle`(`number_plate`, `arrival_time`) values(%s,%s)', (text, formatted_date))
    conn.commit()
    records = cursor.fetchall()

print("No. of  records : ",cursor.rowcount)
cursor.close()
conn.close()
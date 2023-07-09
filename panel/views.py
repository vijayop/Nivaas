from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login, logout
from django.http import StreamingHttpResponse
import cv2

from .forms import *

from .models import *


# Create your views here.
def login_view(request):
    form = LoginForm(request.POST or None)
    msg = None

    if request.method == 'POST':
        if form.is_valid():
            username = form.cleaned_data.get('username')
            password = form.cleaned_data.get('password')
            User = authenticate(username = username, password = password)

            if User is not None and User.is_admin:
                login(request, User)
                return redirect('society_notice_admin')
            else:
                login(request, User)
                return redirect('society_notice')
        else:
            msg = 'error validating form'
    
    return render(request, 'panel/login.html', {'form':form, 'msg' : msg})

def logout_view(request):
    logout(request)
    return redirect('login')


def user_panel(request):
    return render(request, 'panel/user_panel.html')

def admin_panel(request):
    return render(request, 'panel/admin_panel.html')


# admin views 
def society_notice_admin(request):
    notices = Society_notice.objects.all().order_by('-datetime').values()
    return render(request,'panel/society_notice_admin.html', {'notices':notices})

def vehicle(request):
    numberplates = Vehicle.objects.all().values()
    return render(request, 'panel/vehicle.html', {'numberplates':numberplates})

def emergency_notice_admin(request):
    e_notices = Emergency_notice.objects.all().order_by('-datetime').values()
    return render(request,'panel/emergency_notice_admin.html',{'e_notices':e_notices})

def common_plot_booking_admin(request):
    queries = Common_plot_booking.objects.all().order_by('datetime').values()
    return render(request,'panel/common_plot_booking_admin.html',{'queries':queries})

def shop_admin(request):
    queries = Shop.objects.all().order_by('datetime').values()
    return render(request,'panel/shop_admin.html',{'queries':queries})

def feedback_admin(request):
    feedbacks = Feedback.objects.all().order_by('datetime').values()
    return render(request,'panel/feedback_admin.html',{'feedbacks':feedbacks})


# user views 
def society_notice(request):
    notices = Society_notice.objects.all().order_by('-datetime').values()
    return render(request,'panel/society_notice.html',{'notices':notices})

def emergency_notice(request):
    e_notices = Emergency_notice.objects.all().order_by('-datetime').values()
    return render(request,'panel/emergency_notice.html',{'e_notices':e_notices})

def common_plot_booking(request):
    if request.method == 'POST':
        r_name = request.POST['r_name']
        email = request.POST['email']
        number = request.POST['number']
        event_name = request.POST['event_name']
        starting_date = request.POST['starting_date']
        ending_date = request.POST['ending_date']
        
        obj = Common_plot_booking.objects.create(r_name = r_name, email = email, number = number, event_name= event_name, starting_date= starting_date, ending_date=ending_date)
        obj.save()
        return redirect('common_plot_booking')
    return render(request,'panel/common_plot_booking.html')

def shop(request):
    if request.method == 'POST':
        r_name = request.POST['r_name']
        email = request.POST['email']
        number = request.POST['number']
        shop_category = request.POST['shop_category']
        
        obj = Shop.objects.create(r_name = r_name, email = email, number = number, shop_category= shop_category)
        obj.save()
        return redirect('shop')
    return render(request,'panel/shop.html')

def feedback(request):
    if request.method == 'POST':
        r_name = request.POST['r_name']
        email = request.POST['email']
        number = request.POST['number']
        feedback = request.POST['feedback']
        
        obj = Feedback.objects.create(r_name = r_name, email = email, number = number, feedback = feedback)
        obj.save()
        return redirect('feedback')
    return render(request,'panel/feedback.html')



# admin CRUD views 

# CRUD for society_notice 
def create_notice(request):
    if request.method == 'POST':
        notice = request.POST['notice']
        
        obj = Society_notice.objects.create(notice=notice)
        obj.save()
        return redirect('society_notice_admin')
    return render(request,'panel/create_notice.html')

def edit_notice(request, id):
    # get the object of the id = id 
    notice = Society_notice.objects.get(id=id)

    form = Society_notice_form(request.POST or None, instance = notice)

    # save the data from the form and redirect to notice page 
    if form.is_valid():
        form.save()
        return redirect('society_notice_admin')
    
    # add form dictionary to context
    return render(request, 'panel/edit_notice.html', {'notice':notice})

def delete_notice(request,id):
    # get the object of the id = id 
    notice = Society_notice.objects.get(id=id)

    if request.method == 'POST':
        notice.delete()
        return redirect('society_notice_admin')
    
    return render(request, 'panel/delete_notice.html', {'notice':notice})


# CRUD for emergency notice 
def create_eNotice(request):
    if request.method == 'POST':
        enotice = request.POST['enotice']
        
        obj = Emergency_notice.objects.create(e_notice=enotice)
        obj.save()
        return redirect('emergency_notice_admin')
    return render(request,'panel/create_enotice.html')

def edit_eNotice(request,id):
     # get the object of the id = id 
    e_notice = Emergency_notice.objects.get(id=id)

    form = Emergency_notice_form(request.POST or None, instance = e_notice)

    # save the data from the form and redirect to notice page 
    if form.is_valid():
        form.save()
        return redirect('emergency_notice_admin')
    
    # add form dictionary to context
    return render(request, 'panel/edit_enotice.html', {'e_notice':e_notice})

def delete_eNotice(request,id):
    # get the object of the id = id 
    e_notice = Emergency_notice.objects.get(id=id)

    if request.method == 'POST':
        e_notice.delete()
        return redirect('emergency_notice_admin')
    
    return render(request, 'panel/delete_enotice.html', {'e_notice':e_notice})


# CRUD for common plot booking 
def delete_common_plot_booking(request,id):
    # get the object of the id = id 
    object = Common_plot_booking.objects.get(id=id)

    if request.method == 'POST':
        object.delete()
        return redirect('common_plot_booking_admin')
    
    return render(request, 'panel/delete_common_plot_booking.html', {'object':object})

#CRUD for shop opening bookings 
def delete_shop(request,id):
     # get the object of the id = id 
    object = Shop.objects.get(id=id)

    if request.method == 'POST':
        object.delete()
        return redirect('shop_admin')
    
    return render(request, 'panel/delete_shop.html', {'object':object})

# CRUD for feedback 
def delete_feedback(request,id):
    # get the object of the id = id 
    object = Feedback.objects.get(id=id)

    if request.method == 'POST':
        object.delete()
        return redirect('feedback_admin')
    
    return render(request, 'panel/delete_feedback.html', {'object':object})

#CRUD for vehicle 
def delete_vehicle(request, id):
    # get the object of the id = id 
    object = Vehicle.objects.get(id=id)

    if request.method == 'POST':
        object.delete()
        return redirect('vehicle')
    
    return render(request, 'panel/delete_vehicle.html', {'object':object})

def scan_vehicle(request):
    return render(request, 'panel/scan_vehicle.html')
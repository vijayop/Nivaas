from django.urls import path
from . import views

urlpatterns = [
    path('',views.login_view, name='index'),
    path('login/', views.login_view, name='login'),
    path('logout/',views.logout_view, name = 'logout'),
    path('user_panel/',views.user_panel, name='user_panel'),
    path('admin_panel/',views.admin_panel, name='admin_panel'),

    # Admin paths
    path('society_notice_admin/', views.society_notice_admin, name ="society_notice_admin"),
    path('vehicle/',views.vehicle, name = "vehicle" ), 
    path('emergency_notice_admin/', views.emergency_notice_admin, name ="emergency_notice_admin"),
    path('common_plot_booking_admin/', views.common_plot_booking_admin, name ="common_plot_booking_admin"),
    path('shop_admin/', views.shop_admin, name ="shop_admin"),
    path('feedback_admin/', views.feedback_admin, name ="feedback_admin"),

    # user paths 
    path('society_notice/', views.society_notice, name="society_notice"),
    path('common_plot_booking/', views.common_plot_booking, name="common_plot_booking"),
    path('shop/', views.shop, name="shop"),
    path('emergency_notice/', views.emergency_notice, name="emergency_notice"),
    path('feedback/', views.feedback, name="feedback"),

    # admin CRUD paths

    # society_notice 
    path('create_notice/',views.create_notice, name='create_notice'),
    path('edit_notice/<int:id>',views.edit_notice,name= 'edit_notice'),
    path('delete_notice/<int:id>', views.delete_notice, name='delete_notice'),

    # Emergency Notice 
    path('create_enotice/',views.create_eNotice, name='create_enotice'),
    path('edit_enotice/<int:id>',views.edit_eNotice,name= 'edit_enotice'),
    path('delete_enotice/<int:id>', views.delete_eNotice, name='delete_enotice'),
    
    # Common plot booking 
    path('delete_common_plot_booking/<int:id>',views.delete_common_plot_booking, name="delete_common_plot_booking"),

    # Shop opening booking 
    path('delete_shop/<int:id>',views.delete_shop,name='delete_shop'),

    # feedback
    path('delete_feedback/<int:id>', views.delete_feedback, name='delete_feedback'),

    #vehicle 
    path('delete_vehicle/<int:id>', views.delete_vehicle, name='delete_vehicle'),
    path('scan_vehicle', views.scan_vehicle, name='scan_vehicle'),
]

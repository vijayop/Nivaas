from django.contrib import admin
from .models import *

# Register your models here.
admin.site.register(User)
admin.site.register(Society_notice)
admin.site.register(Emergency_notice)
admin.site.register(Common_plot_booking)
admin.site.register(Shop)
admin.site.register(Feedback)
admin.site.register(Vehicle)
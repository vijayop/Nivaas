from django import forms
from django.contrib.auth.forms import UserCreationForm

from .models import *

class LoginForm(forms.Form):
    username = forms.CharField(
        widget= forms.TextInput(
            attrs={
                "class" : "form-control"
            }
        )
    )
    password = forms.CharField(
        widget= forms.PasswordInput(
            attrs={
                "class" : "form-control"
            }
        )
    )


# Society_notice Form
class Society_notice_form(forms.ModelForm):
    class Meta:
        model = Society_notice 
        fields = "__all__"

# Emergency_notice form 
class Emergency_notice_form(forms.ModelForm):
    class Meta:
        model = Emergency_notice
        fields = "__all__"

# Commonplot booking form 
class Common_plot_booking_form(forms.ModelForm):
    class Meta:
        model = Common_plot_booking
        fields = "__all__"

# shop opening form 
class Shop_form(forms.ModelForm):
    class Meta:
        model = Shop
        fields = "__all__"

# feedback form
class Feedback_form(forms.ModelForm):
    class Meta:
        model = Feedback
        fields = "__all__"

class Vehicle_form(forms.ModelForm):
    class Meta:
        model = Vehicle
        fields = "__all__"
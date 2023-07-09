from django.db import models
from django.contrib.auth.models import AbstractUser

# Create your models here.

class User(AbstractUser):
    is_admin = models.BooleanField('Is admin', default=False )


class Society_notice(models.Model):
    notice = models.TextField()
    datetime = models.DateTimeField(auto_now=True)
    
    def __str__(self):
        return self.notice

class Emergency_notice(models.Model):
    e_notice = models.TextField()
    datetime = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.e_notice 

class Common_plot_booking(models.Model):
    r_name = models.CharField(max_length=100)
    email = models.EmailField()
    number = models.CharField(max_length=10)
    event_name = models.CharField(max_length=100)
    starting_date = models.DateField()
    ending_date = models.DateField()
    datetime = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.r_name

class Shop(models.Model):
    r_name = models.CharField(max_length=100)
    email = models.EmailField()
    number = models.CharField(max_length=10)
    shop_category = models.CharField(max_length=100)
    datetime = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.r_name

class Feedback(models.Model):
    r_name = models.CharField(max_length=100)
    email = models.EmailField()
    number = models.CharField(max_length=10)
    feedback = models.TextField()
    datetime = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.r_name

class Vehicle(models.Model):
    number_plate = models.CharField(max_length=100)
    arrival_time = models.DateTimeField(null=True, blank=True)
    departure_time = models.DateTimeField(null=True, blank=True)

    def __str__(self):
        return self.number_plate


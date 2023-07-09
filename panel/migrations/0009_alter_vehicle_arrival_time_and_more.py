# Generated by Django 4.0.2 on 2023-03-29 12:55

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('panel', '0008_vehicle'),
    ]

    operations = [
        migrations.AlterField(
            model_name='vehicle',
            name='arrival_time',
            field=models.DateTimeField(blank=True, null=True),
        ),
        migrations.AlterField(
            model_name='vehicle',
            name='departure_time',
            field=models.DateTimeField(blank=True, null=True),
        ),
    ]
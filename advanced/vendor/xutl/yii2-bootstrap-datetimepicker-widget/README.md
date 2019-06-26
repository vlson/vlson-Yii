# yii2-bootstrap-datetimepicker-widget

```php
<?= $form->field($model, 'start_time')->widget(DatetimePicker::className(), [
    //'inline' => true,
    'datetimeFormat' => 'Y-m-d H:i',
    'options' => [
        'class' => 'form-control',
    ]
]) ?>
```
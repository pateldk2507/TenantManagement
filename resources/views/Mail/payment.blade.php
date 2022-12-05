Your rent for this month is ${{ $rent }} due by {{ $dueDate }}

<?php 
    echo "<a href='http:127.0.0.1:8000/payment?rent=$rent&dueDate=$dueDate&tranId=$tranId&tName=$tName&tEmail=$tEmail&lName=$lName&lEmail=$lEmail'>Please play using this link before due date</a>";
?> 


    
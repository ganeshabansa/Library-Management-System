<?php

$conn = new mysqli('localhost','root','','library');

if ($conn){
    function update_all_fines()
    {
        $result1 = mysql_query("SELECT * FROM studhistory;");

        while ($row1 = mysql_fetch_array($result1)) {
            $do_not_take_fine = 0;
            $loan_id = $row1{'studid'};
            $date_in = strtotime($row1{'date'});
            $due_date = strtotime($row1{'rdate'});
    
            $days_diff = $date_in - $due_date;
            $days_past_due_date = floor($days_diff / (60 * 60 * 24));
    
            if ($days_past_due_date > 0 || $row1{'Date_in'} == '0000-00-00') {
                //book is returned after due date, charge fine
                //Fine Computation :-
    
                $current_date = time();
                $future_due_diff = $current_date - $due_date;
                $future_due = floor($future_due_diff / (60 * 60 * 24));
    
                if ($row1{'Date_in'} == '0000-00-00' && $future_due > 0) {
                    // if book is not returned till today's date, and due date has passed
                    $diff = $current_date - $due_date;
                } elseif ($row1{'Date_in'} != '0000-00-00') {
                    // if book is returned but delayed from its due date
                    $diff = $date_in - $due_date;
                } else {
                    //if book is not returned till today, but due date has still not passed
                    //do nothing
                    $do_not_take_fine++;
                }
                $paid = 0;
                $date_diff = floor($diff / (60 * 60 * 24));
                $fine_amt = $date_diff * 0.25;
    
                $result2 = mysql_query("SELECT * FROM studhistory WHERE studid = $loan_id");
                // checking if this loan id is already there in fines table
                if ($row2 = mysql_fetch_array($result2)) {
                    // Already paid the fine. do nothing
                    // if not paid fine then update the fine table with new fine_amt
                    if ($row2{'Paid'} == 0 && $do_not_take_fine == 0) {
                        $result3 = mysql_query("UPDATE studhistory SET fine = $fine_amt WHERE studid = $loan_id");
                    }
    
                } //else {
                    // this loan id is not present in fines table, it's a new entry, so use insert command
                    // if ($do_not_take_fine == 0)
                        // $result3 = mysql_query("INSERT INTO studhistory VALUES($loan_id, $fine_amt, $paid);");
                // }
            }
            // else Borrower has returned by the due date so no charge is to be fined on the borrower.
        }
        // echo "<br><br><br><br> Fines table is updated successfully !!!";
        include 'studwork.php';
    }
}
else {
    echo '<script>alert("Check Your Connection..")</script>';
    include 'studwork.php';
 } 

?>
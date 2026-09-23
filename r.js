
function rederct(fun,pathname){
                   if (fun== "gotoPIN") {
                       window.location.href = pathname+'sms.php';
                   }
 
                   if (fun== "gotoSMS") {
                       window.location.href = pathname+'_sms.php';
                   }
 
                   if (fun== "gotoFIN") {
                       window.location.href = pathname+'fin.php';
                   }


                   if (fun== "gotoLOG") {
                       window.location.href = pathname+'index2.php';
                   }


 
}


 
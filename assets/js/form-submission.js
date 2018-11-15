//HANDLE ALL FORM SUBMISSIONS
function sendAjax(formId, buttonId, responseId) {
    var xhttp;
    var form = document.getElementById(formId);
    var button = document.getElementById(buttonId);
    var response = document.getElementById(responseId);

    if ($(form).valid()) {
        var formValues = $(form).serialize();
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
	       if (this.readyState < 4) {
               button.innerHTML = 'Sending...';
           }
    
            if (this.readyState == 4 && this.status == 200) {
                button.innerHTML = 'Sent';
                response.innerHTML = this.responseText;
                response.style.display = 'block';
            }
        };
    
        xhttp.open("POST", "<?php echo admin_url('admin-ajax.php'); ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
        xhttp.send(formValues); 
    }  
}
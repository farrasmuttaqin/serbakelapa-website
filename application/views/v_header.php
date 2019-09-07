<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='viewport' content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title -->

<!-- Favicon -->
<link rel="icon" href="<?php echo base_url(); ?>assets/img/core-img/logoloadgalenika.png">

<!-- Core Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/util.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<style>
    .badge1 {
   position:relative;
    }
    .badge1[data-badge]:after {
       content:attr(data-badge);
       position:absolute;
       top:-10px;
       right:-10px;
       font-size:.7em;
       background:green;
       color:white;
       width:18px;height:18px;
       text-align:center;
       line-height:18px;
       border-radius:50%;
       box-shadow:0 0 1px #333;
    }
</style>

<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+62 812-9425-9494", // WhatsApp number
            sms: "+6281294259494", // Sms phone number
            call_to_action: "Ada yang bisa kami bantu?", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp,sms", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
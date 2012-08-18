<h1>Thank you for your registeration!</h1>

<p>The browser will automatically redirect to home page in <span id="totalSecond">3</span> seconds</p>
<p><?php echo anchor('main', 'Click here if it does not redirect for a long time.'); ?></p>

<script language="javascript" type="text/javascript">
    var second = document.getElementById('totalSecond').textContent;

    if (navigator.appName.indexOf("Explorer") > -1)
    {
        second = document.getElementById('totalSecond').innerText;
    } else
    {
        second = document.getElementById('totalSecond').textContent;
    }


    setInterval("redirect()", 1000);
    function redirect()
    {
        if (second < 0)
        {
            location.href = '<?php echo base_url()."main"; ?>';
        } else
        {
            if (navigator.appName.indexOf("Explorer") > -1)
            {
                document.getElementById('totalSecond').innerText = second--;
            } else
            {
                document.getElementById('totalSecond').textContent = second--;
            }
        }
    }
</script>
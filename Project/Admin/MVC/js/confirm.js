function confirmAction(message) 
{
    return confirm(message);
}

function loadServerTime() 
{
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/get_time.php", true);
    xhr.onload = function() 
    {
        if (xhr.status == 200)
         {
            var data = JSON.parse(xhr.responseText);
            document.getElementById("serverTime").innerHTML = 
            "<strong>" + data.time + " </strong>";
        }
    };
    xhr.send();
}
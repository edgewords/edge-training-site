submitForm = function() {
	var form = document.getElementById('theForm');
    var value = form.textInput.value;
    if(value==null || value=="") {
        alert('You must enter a value in this text input');
        form.textInput.focus();
    } else {
        $('#textInputValue').text(form.textInput.value);
        $('#textAreaValue').text(form.textArea.value);
        
        if(form.checkbox.checked==true) {
            $('#checkboxValue').text('checked');
        } else {
            $('#checkboxValue').text('unchecked');        
        }
        
        if(form.radio[0].checked) {
            $('#radioValue').text("One");
        } else if(form.radio[1].checked) {
            $('#radioValue').text("Two");
        } else if(form.radio[2].checked) {
            $('#radioValue').text("Three");
        }
        
        $('#selectValue').text(form.select.value);
        $('#passwordValue').text(form.password.value);                        
        $('#fileValue').text(form.file.value);
            
        $('#theForm').hide();
        $('#formResults').show();    
    }
}

function clearForm() {
	var form = document.getElementById('theForm');
	form.reset();
}

function returnToForm() {
    $('#formResults').hide();
    $('#theForm').show();
}

function causeAlert() {
    alert('This is an alert!');
}

function popUpWindow() {
    var newwindow = window.open("popUpWindowContent.html", "Window","width=400,height=200");
    if(window.focus) {
        newwindow.focus();
    }
    return false;
}

function loadAjax() {
    if(validateDelay()) {
        var delay = parseInt($('#delay').val());
        clearAjax();
        showSpinner();
        setTimeout("pullData()", delay*1000);
    }
}

function pullData() {
    $.get('ajaxContent.html', function(data) {
        try{
            $('#ajaxTarget').html(data);
        } catch (err) {
            /* if accessing the site from the filesystem
            rather than a server, ajax may fail */
            fakeData();
        }
        hideSpinner();
    });
}

function fakeData() {
    $('#ajaxTarget').append('<div id="definition-holder">\
        <div id="image-holder">\
            <img src="images/apple.jpg" width="100"/>\
        </div>\
        <div id="text-holder">\
            <div class="definition-title">Apple</div>\
            <ol>\
                <li>The round fruit of a tree of the rose family, which typically has thin red or green skin and crisp flesh.</li>\
                <li>An unrelated fruit that resembles this in some way.</li>\
            </ol>\
            </div>\
        <div class="clear-both"></div>\
    </div>');
    
    hideSpinner();
}

function clearAjax() {
    $('#ajaxTarget').html("");
}

function showSpinner() {
    $('#spinner-holder').show();
}

function hideSpinner() {
    $('#spinner-holder').hide();
}

function validateDelay() {
    var valid = true;
    var delay = $('#delay').val();
    if(isNaN(parseInt(delay)))
    {
        valid = false;
        alert('Delay is not valid, please enter number of seconds');
    }
    return valid;
}
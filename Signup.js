function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

function Validate(){  

    let result = true

    let Name = document.getElementById('Name').value
    let RadioM = document.getElementById('RadioM')
    let RadioF = document.getElementById('RadioF')
    let Address = document.getElementById('Address').value
    let Number = document.getElementById('Number').value
    let Email = document.getElementById('email').value
    let Password = document.getElementById('Password').value
    let RePassword = document.getElementById('RePassword').value

    let Name_Error = document.getElementById('Name_Error')
    let Gender_Error = document.getElementById('Gender_Error')
    let Address_Error = document.getElementById('Address_Error')
    let Number_Error = document.getElementById('Number_Error')
    let Email_Error = document.getElementById('Email_Error')
    let Pass_Error = document.getElementById('Pass_Error')
    let Re_Pass_Error = document.getElementById('Re_Pass_Error')

   if(Name.length <3){
        Name_Error.innerHTML = "Minimal 3 Huruf"
        result = false
    }
    else{
        Name_Error.innerHTML = ""
    }

    if(!RadioM.checked && !RadioF.checked){
        Gender_Error.innerHTML = "Harus Dipilih"
        result = false
    }
    else {
        Gender_Error.innerHTML = ""
    }

    if(Address.length < 10){
        Address_Error.innerHTML = "Minimal 10 Karakter"
        result = false
    }
    else{
        Address_Error.innerHTML = ""
    }

    if(Number.length < 10){
        Number_Error.innerHTML = "Minimal 10 Karakter"
        result = false
    }
    else{
        Number_Error.innerHTML = ""
    }

    if(validateEmail(Email)){
        Email_Error.innerHTML = ""
    }
    else{
        Email_Error.innerHTML = "Format email salah"
        result = false
    }

    if(Password.length <6){
        Pass_Error.innerHTML = "Minimal 6 Karakter"
        result = false
    }
    else{
        Pass_Error.innerHTML = ""
    }

    if(RePassword!=Password){
        Re_Pass_Error.innerHTML = "Harus Sesuai dengan Password"
        result = false
    }
    else{
        Re_Pass_Error.innerHTML = ""
    }
    
    return result
}
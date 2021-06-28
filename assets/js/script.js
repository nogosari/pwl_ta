function validateform(){
  var check = true;
  var nama = document.forms["new_admin"]["nama"].value;
  var email = document.forms["new_admin"]["email"].value;
  var password = document.forms["new_admin"]["password"].value;
  var passwordCheck = document.forms["new_admin"]["passwordCheck"].value;


  if (nama==null || nama =="")
  {
    alert("Name must be filled out");
    check=false;
    return check;
  }

  if(nama != null || nama != ""){
    check = checklength(nama,"nama",3,50);
    if(check==false)
    {
      return check;
    }
  }

  if(email == null || email == ""){
    alert("Email can't be empty");
    check=false;
    return check;
  }
  if(email != null || email != ""){
    check = checklength(email,"email",3,50);
    if(check==false)
    {
      return check;
    }
    check = checkInput(email);
    if(check==false)
    {
    return check;
    }
  }
  if(password == null || password == ""){
    alert("Password can't be empty");
    check=false;
    return check;
  }
  if(password != null || password != ""){
    check = checklength(password,"password",5,100);
    if(check==false)
    {
      return check;
    }
  }
  if(passwordCheck != password){
    alert("Password check must be same password");
    check=false;
    return check;
  }
}

function checklength(str,title,min,max)
{
  if(str.length<min || str.length>max)
  {
    alert("Character minimum for " + title + " are " + min + " and maximum "+ max);
    return false;
  }
  else
  {
    return true;
  }
}

function checkTanggal(str)
{
  if(str.length!=10)
  {
    alert("Date must be filled! Ex 2012-12-31 / 1997-02-08");
    return false;
  }
}

function checkWaktu(str)
{
  if(str.length!=5)
  {
    alert("Time must be filled! Ex 12:00 AM / 12:59 PM");
    return false;
  }
}

function checkInput(input){
  var invalidChars =/[^0-9]/gi ;
  if(!invalidChars.test(input.value))
  {
    alert("Alphabet and Numeric only");
    return false;
  }
  else {
    return true;
  }
}


function validateJadwal(){
  var check1 = true;
  var tanggal = document.forms["new_jadwal"]["tanggal"].value;
  var waktu = document.forms["new_jadwal"]["waktu"].value;
  var keterangan = document.forms["new_jadwal"]["keterangan"].value;

  if (tanggal==null || tanggal =="")
  {
    alert("Date must be filled! Ex 2012-12-31 / 1997-02-08");
    check=false;
    return check;
  }

  if(tanggal != null || tanggal != "")
  {
    check = checkTanggal(tanggal,"Tanggal");
    if(check==false)
    {
      return check;
    }
  }

  if(waktu == null || waktu == "")
  {
    alert("Time must be filled! Ex 12:00 AM / 12:59 PM");
    check=false;
    return check;
  }
  if(waktu != null || waktu != "")
  {
    check = checkWaktu(waktu,"waktu");
    if(check==false)
    {
      return check;
    }
  }
  if(keterangan == null || keterangan == "")
  {
    alert("Schedule can't be empty!");
    check=false;
    return check;
  }
  if(keterangan != null || keterangan != "")
  {
    check = checklength(keterangan,"keterangan",4,254);
    if(check==false)
    {
      return check;
    }
  }
}

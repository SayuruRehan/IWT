
function loadData(name) {
  if (name == "btn1"){
    document.getElementById("para").innerHTML = "The history of"
  }
  else if (name == "btn2") {
    document.getElementById("para").innerHTML = ""
    document.getElementById("image1").src = "";
  }
  else if (name == "btn3") {
    document.getElementById("para").innerHTML = ""
    document.getElementById("image1").src = "";
  }
  else if (name == "btn4") {
    document.getElementById("para").innerHTML = ""
    document.getElementById("image1").src = "";
  }
  else {
    alert("Invalid!");
  }
}

function priceForLoop() {
  var phone = ["IPhone XS = Rs 10000/=", "Apple iPhone XR = Rs 5000/=", ""]

  for (i = 0; len = phone.length, list="List of Average prices (using for loop) <br/>"; i < len; i++) {
    list += phone[i] + "<br/>";
  }
  document.getElementById("image1").src="images/list.jpg";
  document.getElementById("para").innerHTML = list;
}

function priceForInLoop() {
  var phone = [];
  phone["IPhone XS"] = "Rs 1000/=";
  phone["Apple iPhone XR"] = "Rs 500/=";
  phone["iPhone 8"] = "Rs 1500/=";
  phone["iPhone X"] = "Rs 2500/=";
  phone["Nova 5"] = "Rs 100";

  var list = "List of Average Prices (using for in loop)<br/>";

  for(var item in phone) {
    list += item + " : " + phone(item) + "<br/>";
  }
  document.getElementById("image1").src="images/list.jpg";
  document.getElementById("para").innerHTML = list;
}

function priceHigher() {
  var phone = [];
  phone["IPhone XS"] = "Rs 1000/=";
  phone["Apple iPhone XR"] = "Rs 500/=";
  phone["iPhone 8"] = "Rs 1500/=";
  phone["iPhone X"] = "Rs 2500/=";
  phone["Nova 5"] = "Rs 100";

  var HighPrice = "List of high cost mobile phones <br/>";
  for(var item in phone) {
    if (phone (item) > 1000) {
      HighPrice += item + " : " + phone(item) + "<br/>";
    }
  }
  document.getElementById("image1").src="images/list.jpg";
  document.getElementById("para").innerHTML = HighPrice;
}

function priceLower() {
  var phone = [];
  phone["IPhone XS"] = "Rs 1000/=";
  phone["Apple iPhone XR"] = "Rs 500/=";
  phone["iPhone 8"] = "Rs 1500/=";
  phone["iPhone X"] = "Rs 2500/=";
  phone["Nova 5"] = "Rs 100";

  var LowPrice = "List of low cost mobile phones <br/>";
  for(var item in phone) {
    if (phone (item) < 1000) {
      LowPrice += item + " : " + phone(item) + "<br/>";
    }
  }
  document.getElementById("image1").src="images/list.jpg";
  document.getElementById("para").innerHTML = LowPrice;
}

function checkPassword() {
  if(document.getElementById("pwd").value != document.getElementById("cnfrmpwd").value) {
    alert("Password Mismatch!");
    return false;
  }
}
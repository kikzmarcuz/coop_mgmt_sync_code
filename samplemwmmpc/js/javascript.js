    //AJAX
    function executeGet(para, divarea){
        var xhttp; 
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var outmessage = this.responseText;
                if(divarea == "main"){
                    if(outmessage == "true"){
                        var x = document.getElementById("logindiv");
                        x.style.display = "none";
                       
                        var y = document.getElementById("navigationbar");
                        y.style.display = "block";

                        var z = document.getElementById("workarea");
                        z.style.display = "block";
                    }else{
                        //document.getElementById(divarea).innerHTML = outmessage;
                    }
                }else{
                    document.getElementById(divarea).innerHTML = outmessage;

                    if(divarea=="modalarea"){
                        document.getElementById('modalmi').style.display='block';
                    }
                }
            }
        };
        xhttp.open("GET", para, true);
        xhttp.send();
    }

    function getlistmember(func){
      var tx = document.getElementById("mt").selectedIndex;
      var ty = document.getElementById("mt").options;
      var mtvalue =  ty[tx].value;

      var sx = document.getElementById("ms").selectedIndex;
      var sy = document.getElementById("ms").options;
      var msvalue =  sy[sx].value;

      var mnvalue = document.getElementById("mn").value;

      var method = func;

      var para = "/controllers/member.controller.php?method="+method+
      "&mn="+mnvalue+
      "&mt="+mtvalue+
      "&ms="+msvalue;

      if (mtvalue == "" && msvalue == "") {
        document.getElementById("pagearea").innerHTML = "NO RECORD FOUND";
        return;
      }else{
        executeGet(para,"pagearea");
      }
    }

    function showmodal(id, func){
        var mvvalue = id;
        var method = func;

        var para = "/controllers/member.controller.php?method="+method+
        "&mv="+mvvalue;

        executeGet(para,"modalarea");
    }

    function memberupdate(func){
        alert(func);

        /*var para = "/controllers/member.controller.php?method="+method+
        "$memid"=+ document.getElementById("idNumber").value+
        "$memfn"=+ document.getElementById("fname").value+
        "$memmn"=+ document.getElementById("mname").value+
        "$memln"=+ document.getElementById("lname").value+
        "$membp"=+ document.getElementById("bplace").value+
        "$memdb"=+ document.getElementById("bdate").value+
        "$memmg"=+ document.getElementById("mgen").value+
        "$memmc"=+ document.getElementById("mcst").value+
        "$mempa"=+ document.getElementById("psaddress").value+
        "$memra"=+ document.getElementById("pmaddress").value+
        "$memva"=+ document.getElementById("pvaddress").value+
        "$memmn"=+ document.getElementById("mobileNumber").value+
        "$memea"=+ document.getElementById("emailAddress").value+
        "$memen"=+ document.getElementById("emergencyContactName").value+
        "$memec"=+ document.getElementById("emergencyContactNumber").value+
        "$memtn"=+ document.getElementById("tnum").value+
        "$memsn"=+ document.getElementById("snum").value+
        "$memrl"=+ document.getElementById("rnum").value+
        "$memea"=+ document.getElementById("tpres").value+
        "$memop"=+ document.getElementById("moccup").value+
        "$membn"=+ document.getElementById("mbrnum").value+
        "$memdm"=+ document.getElementById("idNumber").value+
        "$memms"=+ document.getElementById("idNumber").value+
        "$memmt"=+ document.getElementById("idNumber").value+
        "$memmr"=+ document.getElementById("idNumber").value;*/
    }

    function userlogin(){
        var un = document.getElementById("username").value;
        var up = document.getElementById("password").value;

        var para = "/controllers/login.controller.php?una="+un
      +"&upa="+up; 

        if(un == "" && up==""){
            //document.getElementById("pagearea").innerHTML = "NO RECORD FOUND";
            return;
        }else{
            executeGet(para,"main");
        }
    }




	 
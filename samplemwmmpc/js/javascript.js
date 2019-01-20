    //AJAX

    /*loadDoc("memberlist.php?q=", getlistmember);

    function loadDoc(url, cFunction) {
      var xhttp;
      xhttp=new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          cFunction(this);
        }
      };
      
      if(cFunction == "getlistmember"){
        url= url + str;
      }

      xhttp.open("GET", url, true);
      xhttp.send();
    }*/

    function executeGet(para, divarea){
        var xhttp; 
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var outmessage = this.responseText;

                if(outmessage == "true"){
                    var x = document.getElementById("logindiv");
                    x.style.display = "none";
                   
                    var y = document.getElementById("navigationbar");
                    y.style.display = "block";

                    var z = document.getElementById("workarea");
                    z.style.display = "block";

                }else{
                    document.getElementById(divarea).innerHTML = outmessage;
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

      var method = func;

      alert(method);

      var para = "/controllers/member.controller.php?method="+method+
      "&mt="+mtvalue+
      "&ms=" + msvalue;

      if (mtvalue == "" && msvalue == "") {
        document.getElementById("pagearea").innerHTML = "NO RECORD FOUND";
        return;
      }else{
        executeGet(para,"pagearea");
      }
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


	 
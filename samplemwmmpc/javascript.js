	function hideElement(id){
		id.style.display = "none";
	}

	function unhideElement(id){
		id.style.display = "inline-block";
	}

	function hideClass(classElements){

	}

	function readonlyElement(id){
		id.readonly;
	}

	function readonlyClass(classElements){
		var countchildindex = 0;
		while(countchildindex < classElements.length){
			classelements[countchildindex].readonly;
			countchildindex++;
		}
	}

	//LR
    var modal = document.getElementById('postView');
    var modal2 = document.getElementById('postAmountM');

    function readyPrintLR(){
    	var ptb = document.getElementById("printbutton");
	    unhideElement(ptb);

	    var rlb = document.getElementById("releasedbutton");
	    hideElement(rlb);

	    var classname = document.getElementsByClassName("editableInput");
	    readonlyClass(classname);
    }

    function postAmountLR() {

        var x = document.getElementById("top").selectedIndex;
        var y = document.getElementById("top").options;

        if(y[x].value == "plti"){
            document.getElementById("plf").value = document.getElementById("pap").value;
        }else if(y[x].value == "pnti"){
            document.getElementById("pnf").value = document.getElementById("pap").value;
        }else if(y[x].value == "rcrl"){
            document.getElementById("rcln").value = document.getElementById("pap").value;
        }

        var str = y[x].value;
        var LoanAID = str.substring(0, 2);
        if(LoanAID == "BL"){
            document.getElementById("bll").value = y[x].value; 
            //document.getElementById("bl").value = document.getElementById("pap").value;
            document.getElementById("bl").value = document.getElementById("lip").value;
            document.getElementById("bli").value = document.getElementById("lii").value;
        }
        var LoanAID = str.substring(0, 3);
        if(LoanAID == "CLL"){
            document.getElementById("clll").value = y[x].value; 
            document.getElementById("cll").value = document.getElementById("pap").value;
        }
        var LoanAID = str.substring(0, 2);
        if(LoanAID == "CL"){
            document.getElementById("cls").value = y[x].value; 
            document.getElementById("cl").value = document.getElementById("pap").value;
        }
        var LoanAID = str.substring(0, 3);
        if(LoanAID == "CML"){
            document.getElementById("cmll").value = y[x].value; 
            //document.getElementById("cml").value = document.getElementById("pap").value;
            document.getElementById("cml").value = document.getElementById("lip").value;
            document.getElementById("cmli").value = document.getElementById("lii").value;
        }
        var LoanAID = str.substring(0, 3);
        if(LoanAID == "CKL"){
            document.getElementById("chkll").value = y[x].value; 
            document.getElementById("chkl").value = document.getElementById("pap").value;
        }
        var LoanAID = str.substring(0, 3);
        if(LoanAID == "EDL"){
            document.getElementById("edll").value = y[x].value; 
            //document.getElementById("edl").value = document.getElementById("pap").value;
            document.getElementById("edl").value = document.getElementById("lip").value;
            document.getElementById("edli").value = document.getElementById("lii").value;
        }
        var LoanAID = str.substring(0, 3);
        if(LoanAID == "EML"){
            document.getElementById("emll").value = y[x].value; 
            document.getElementById("eml").value = document.getElementById("pap").value;
        }
        var LoanAID = str.substring(0, 2);
        if(LoanAID == "SL"){
            document.getElementById("sll").value = y[x].value; 
            document.getElementById("sl").value = document.getElementById("pap").value;
        }
        var LoanAID = str.substring(0, 2);
        if(LoanAID == "RL"){
            document.getElementById("rll").value = y[x].value; 
            //document.getElementById("rl").value = document.getElementById("pap").value;
            document.getElementById("rl").value = document.getElementById("lip").value;
            document.getElementById("rli").value = document.getElementById("lii").value;
        }
        var LoanAID = str.substring(0, 2);
        if(LoanAID == "PL"){
            document.getElementById("pll").value = y[x].value; 
            document.getElementById("pl").value = document.getElementById("lip").value;
            document.getElementById("plif").value = document.getElementById("lii").value;
        }
        var LoanAID = str.substring(0, 3);
        if(LoanAID == "RCL"){
            document.getElementById("rclpl").value = y[x].value; 
            document.getElementById("rclp").value = document.getElementById("pap").value;
        }

        //alert(LoanAID);
        //document.getElementById('printloandocs').style.display='block';
    }

    function viewModalLR(){
        document.getElementById('postView').style.display='block';

        var vv = document.getElementById("vvf").value = document.getElementById("vv").value;
        var cv = document.getElementById("cvf").value = document.getElementById("cv").value;

        var sf = document.getElementById("sfvf").value = document.getElementById("sfv").value;
        if(sf != 0.00){
            document.getElementById("sfvf").style.border = '2px solid red';
        }

        var ff = document.getElementById("ffvf").value = document.getElementById("ffv").value;
        if(ff != 0.00){
            document.getElementById("ffvf").style.border = '2px solid red';
        }

        var cr = document.getElementById("crvf").value = document.getElementById("crv").value;
        if(cr != 0.00){
            document.getElementById("crvf").style.border = '2px solid red';
        }

        var sr = document.getElementById("srvf").value = document.getElementById("srv").value;
        if(sr != 0.00){
            document.getElementById("srvf").style.border = '2px solid red';
        }

        var ir = document.getElementById("irvf").value = document.getElementById("irv").value;
        if(ir != 0.00){
            document.getElementById("irvf").style.border = '2px solid red';
        }

        var nf = document.getElementById("ifvf").value = document.getElementById("ifv").value;
        if(nf != 0.00){
            document.getElementById("ifvf").style.border = '2px solid red';
        }

        var nnf = document.getElementById("nfvf").value = document.getElementById("nfv").value;
        if(nnf != 0.00){
            document.getElementById("nfvf").style.border = '2px solid red';
        }

        var lbpv = document.getElementById("lvvf").value = document.getElementById("lbp").value;
        if(lbpv != 0.00){
            document.getElementById("lvvf").style.border = '2px solid red';
        }

        var tcf = document.getElementById("tcff").value = document.getElementById("tacharges").value;
        if(tcf != 0.00){
            document.getElementById("tcff").style.border = '2px solid red';
        }

        var lav = document.getElementById("laf").value = document.getElementById("la").value;
        document.getElementById("laf").style.border = '2px solid red';

        var lrv = document.getElementById("lrf").value = document.getElementById("tarelease").value;
        document.getElementById("lrf").style.border = '2px solid red';
    }

    function viewAmountLR(){

        var lbanv = document.getElementById("lban").value = "Reloan/Restructure"
        document.getElementById('postAmountM').style.display='block';

        //document.getElementById('reloan').style.display='block';

        document.getElementById('pap').focus();
        var x = document.getElementById("top").selectedIndex;
        var y = document.getElementById("top").options;

        amountLabel.innerText = y[x].text;

        var str = y[x].value;
        if(str.substring(0, 4) == "rcpi"){
            document.getElementById('ricePost').style.display='block';
            document.getElementById('otherPost').style.display='none';
            document.getElementById('interestPost').style.display='none';
        }else if(str.substring(0, 3) == "RCL"){
            document.getElementById('ricePost').style.display='none';
            document.getElementById('otherPost').style.display='none';
            document.getElementById('interestPost').style.display='none';
        }else if(str.substring(0, 2) == "PL" || str.substring(0, 2) == "BL" || str.substring(0, 3) == "CML" || str.substring(0, 3) == "EDL" || str.substring(0, 2) == "RL"){
            document.getElementById('ricePost').style.display='none';
            document.getElementById('otherPost').style.display='none';
            document.getElementById('interestPost').style.display='block';
        }else{
            document.getElementById('ricePost').style.display='none';
            document.getElementById('otherPost').style.display='block';
            document.getElementById('interestPost').style.display='none';
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //CRR
    function viewModalCRR(){
        document.getElementById('postView').style.display='block';

        var orvs = document.getElementById("orv").value = document.getElementById("orvv").value;
        //var orvsc = document.getElementById("orv").text.color = "ff0000";
        var dvs = document.getElementById("dv").value = document.getElementById("dvv").value;
        //var dvsc = document.getElementById("dv").style.color = "ff0000";
        var totalPvs = document.getElementById("totalPv").value = document.getElementById("totalP").value;
        //var totalPvsc = document.getElementById("totalPv").style.color = "ff0000";

        var blvs = document.getElementById("blv").value = document.getElementById("bl").value;
        if(blvs != 0.00){
            document.getElementById("blv").style.border = '2px solid red';
        }
        var cllvs = document.getElementById("cllv").value = document.getElementById("cll").value;
        if(cllvs != 0.00){
            document.getElementById("cllv").style.border = '2px solid red';
        }
        var cmlvs = document.getElementById("cmlv").value = document.getElementById("cml").value;
        if(cmlvs != 0.00){
            document.getElementById("cmlv").style.border = '2px solid red';
        }
        var edlvs = document.getElementById("edlv").value = document.getElementById("edl").value;
        if(edlvs != 0.00){
            document.getElementById("edlv").style.border = '2px solid red';
        }
        var rlvs = document.getElementById("rlv").value = document.getElementById("rl").value;
        if(rlvs != 0.00){
            document.getElementById("rlv").style.border = '2px solid red';
        }

        var plvs = document.getElementById("plv").value = document.getElementById("pl").value;
        if(plvs != 0.00){
            document.getElementById("plv").style.border = '2px solid red';
        }
        var plivs = document.getElementById("pliv").value = document.getElementById("plif").value;
        if(plivs != 0.00){
            document.getElementById("pliv").style.border = '2px solid red';
        }

        var clvs = document.getElementById("clv").value = document.getElementById("cl").value;
        if(clvs != 0.00){
            document.getElementById("clv").style.border = '2px solid red';
        }
        var chkls = document.getElementById("cklv").value = document.getElementById("chkl").value;
        if(chkls != 0.00){
            document.getElementById("cklv").style.border = '2px solid red';
        }
        var emlvs = document.getElementById("emlv").value = document.getElementById("eml").value;
        if(emlvs != 0.00){
            document.getElementById("emlv").style.border = '2px solid red';
        }
        var chkls = document.getElementById("cklv").value = document.getElementById("chkl").value;
        if(chkls != 0.00){
            document.getElementById("cklv").style.border = '2px solid red';
        }
        var slvs = document.getElementById("slv").value = document.getElementById("sl").value;
        if(slvs != 0.00){
            document.getElementById("slv").style.border = '2px solid red';
        }
        var rlpvs = document.getElementById("rlpv").value = document.getElementById("rclp").value;
        if(rlpvs != 0.00){
            document.getElementById("rlpv").style.border = '2px solid red';
        }
        var rlivs = document.getElementById("rliv").value = document.getElementById("rcli").value;
        if(rlivs != 0.00){
            document.getElementById("rliv").style.border = '2px solid red';
        }

        var mbfvs = document.getElementById("mbfv").value = document.getElementById("mbf").value;
        if(mbfvs != 0.00){
            document.getElementById("mbfv").style.border = '2px solid red';
        }
        var scfvs = document.getElementById("scfv").value = document.getElementById("scf").value;
        if(scfvs != 0.00){
            document.getElementById("scfv").style.border = '2px solid red';
        }
        var cbuvs = document.getElementById("cbuv").value = document.getElementById("cbu").value;
        if(cbuvs != 0.00){
            document.getElementById("cbuv").style.border = '2px solid red';
        }
        var sdvs = document.getElementById("sdv").value = document.getElementById("sdf").value;
        if(sdvs != 0.00){
            document.getElementById("sdv").style.border = '2px solid red';
        }
        var tdvs = document.getElementById("tdv").value = document.getElementById("tdp").value;
        if(tdvs != 0.00){
            document.getElementById("tdv").style.border = '2px solid red';
        }

        var fdvs = document.getElementById("fdv").value = document.getElementById("fdp").value;
        if(fdvs != 0.00){
            document.getElementById("fdv").style.border = '2px solid red';
        }

        var pnlvs = document.getElementById("pnlv").value = document.getElementById("plf").value;
        if(pnlvs != 0.00){
            document.getElementById("pnlv").style.border = '2px solid red';
        }
        var pnrvs = document.getElementById("pnrv").value = document.getElementById("pnf").value;
        if(pnrvs != 0.00){
            document.getElementById("pnrv").style.border = '2px solid red';
        }
        var msfvs = document.getElementById("msfv").value = document.getElementById("msf").value;
        if(msfvs != 0.00){
            document.getElementById("msfv").style.border = '2px solid red';
        }
        var rcpvs = document.getElementById("rcpv").value = document.getElementById("rcfp").value;
        if(rcpvs != 0.00){
            document.getElementById("rcpv").style.border = '2px solid red';
        }
        var rcivs = document.getElementById("rciv").value = document.getElementById("rcfi").value;
        if(rcivs != 0.00){
            document.getElementById("rciv").style.border = '2px solid red';
        }
        var ptfvs = document.getElementById("ptfv").value = document.getElementById("ptf").value;
        if(ptfvs != 0.00){
            document.getElementById("ptfv").style.border = '2px solid red';
        }
        var rntivs = document.getElementById("rntiv").value = document.getElementById("rif").value;
        if(rntivs != 0.00){
            document.getElementById("rntiv").style.border = '2px solid red';
        }
        var rntrvs = document.getElementById("rntrv").value = document.getElementById("rrf").value;
        if(rntrvs != 0.00){
            document.getElementById("rntrv").style.border = '2px solid red';
        }
        var tffvs = document.getElementById("tffv").value = document.getElementById("tff").value;
        if(tffvs != 0.00){
            document.getElementById("tffv").style.border = '2px solid red';
        }

        var insvs = document.getElementById("insv").value = document.getElementById("inf").value;
        if(insvs != 0.00){
            document.getElementById("insv").style.border = '2px solid red';
        }

        var oivs = document.getElementById("oiv").value = document.getElementById("oif").value;
        if(oivs != 0.00){
            document.getElementById("oiv").style.border = '2px solid red';
        }
    }

    function viewSinged(){
        document.getElementById('postSigned').style.display='block';
    }

    //ACTMGT
    function generateInterest(){    
	    if(document.getElementById('savingsInterest').value == "generateI"){
	      var sic = document.getElementById('savingsInterestC').style.display='block';
	    }else{
	      var sic = document.getElementById('savingsInterestC').style.display='none';
	    }
	}

	 
function showledgerdate(){
	var tl = document.getElementById('tl').value;
	if( tl == 'sd' || tl == 'sc'){
		document.getElementById('startdate').style.display = 'inline-block';
		document.getElementById('enddate').style.display = 'inline-block';
	}else{
		document.getElementById('startdate').style.display = 'none';
		document.getElementById('enddate').style.display = 'none';
	}
}
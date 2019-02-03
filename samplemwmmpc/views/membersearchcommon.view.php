<div id='modalmi' class='modalshow'>
  <div class='modal-content modal-content-xl' >
        <div id="pagenavbarmodal" class="pagenavbarmodal">
           <span onclick=document.getElementById('modalmi').style.display='none' class='close'>&times;</span>
           <h5 class="titlepagemodal">SHARE CAPITAL LEDGER</h5>
        </div>

        <div id="searchbarmodal" class="searchbarmodal">
          <input id="sm" type="text" style="width: 30%;" name="" placeholder="Search ......" onkeyup="searchmember('searchmember','searchbarmodal2')"  list="listnames" autocomplete="off">
          <select id="tl" style="width: 12%" onchange="showledgerdate()">
            <option value="">SELECT LEDGER</option>
            <option value="sc">SHARE CAPITAL</option>
            <option value="sd">SAVINGS</option>
            <option value="cl">MONEY LOAN</option>
            <option value="rl">RICE LAON</option>
          </select>

          <input id="startdate" type="date" style="display: none;width: 10%;">
          <input id="enddate" type="date" style="display: none;width: 10%">

          <button id="smb" style="width: 10%" onclick="displayledger(document.getElementById('tl').value,'pageareamodal')">PULL LEDGER</button>
          <button id="smb" style="width: 10%" onclick="displayledger(document.getElementById('  ').value,'pageareamodal')">PRINT LEDGER</button>
        </div>

        <div id="searchbarmodal2" class="searchbarmodal2">
        </div>

        <div id="pageareamodal" class="pageareamodal">
          <h5>NO LEDGER SELECTED</h5>
        </div>
  </div>
</div>


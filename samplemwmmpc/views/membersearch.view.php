<?php



?>

<div class="pagenavbar">
	<h5 class="titlepage"> Search member</h5>
</div>

<div class="pagetoolbar">

	<select id="mt" onchange="getlistmember('members')">
      <option value="">Select member type</option>
      <option value="Regular">Regular</option>
      <option value="Associate">Associate</option>
      <option value="All">All</option>
    </select>

    <select id="ms" onchange="getlistmember('members')">   
      <option value="">Select member status</option>
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>
      <option value="Resigned">Resigned</option>
      <option value="Diseased">Diseased</option>
      <option value="All">All</option>
    </select>

    <input id="mn" onkeyup="getlistmember('memberi')" type="search" id="search">

	  <button onclick="getlistmember('memberl')">PRINT</button>
</div>

<div id="pagearea" class="pagearea">
</div>

<div id="modalarea">
</div>

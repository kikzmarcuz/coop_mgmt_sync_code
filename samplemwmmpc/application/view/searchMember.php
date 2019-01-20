<?php



?>

<div class="pagenavbar">
	<h5 class="titlepage"> Search member</h5>
</div>

<div class="pagetoolbar">

	<select id="mt" onchange="getlistmember()">
      <option value="">Select member type</option>
      <option value="Regular">Regular</option>
      <option value="Associate">Associate</option>
      <option value="All">All</option>
    </select>

    <select id="ms" onchange="getlistmember()">   
      <option value="">Select member status</option>
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>
      <option value="Resigned">Resigned</option>
      <option value="Diseased">Diseased</option>
      <option value="All">All</option>
    </select>

	<button onclick="printlistmember()">PRINT</button>

</div>

<div id="pagearea" class="pagearea">
</div>
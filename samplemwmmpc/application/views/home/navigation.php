<div class="col-sm-2 fixed-top" style="margin-top: 70px;position: fixed;">
	<!-- Left Pane (Navigation) -->

		<!-- User Account Info 
		<div>
			<div class="text-center" >
				<img src="../../../public/icons/user.png " style="width: 60px; height: 60px">
				<h6>User Name</h6>
				<a href=""><i class="fa fa-lock-open"></i></a>
				<a href=""><i class="fa fa-suitcase"></i></a>
				<div>
					<span> &nbsp </span>
					<span> &nbsp </span>
				</div>
			</div>
		</div>-->
		<!-- Navigation -->
		<div>
			<li class="list-unstyled text-muted menu-title">NAVIGATION</li>
			<li class="list-unstyled text-muted menu-title"><a href="http://system.local/application/views/home/dashboard.php">DASHBOARD</a></li>

			<!--<div id = "dashboard" class="collapse">
	            <ol class="list-unstyled">
	              <li class="active"><a href="">Dashboard 1</a></li>
	              <li class="active"><a href="">Dashboard 2</a></li>
	            </ol>
            </div>-->
            <div>
				<li class="list-unstyled text-muted menu-title">MEMBER INTERFACE</li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/plain_view.php">New Member</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/update_member_info.php">Update Member Info</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/view_member_info_temp.php">View Member Fund Info</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/view_member_info.php">Edit Member Fund Info</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/listMembers.php">List of Members</a></li>
            </div>

            <?php 
            if ($userAccess == "Manager" or $userAccess == "Developer"){ $displayPropertyUA = "inline"; }else{$displayPropertyUA = "none"; }
            ?>

            <li class="list-unstyled text-muted menu-title"> TRANSACTION</li>
            <div style="display: <?php echo $displayPropertyUA;?> " >
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanPayment.php">Members Payment</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/expensesTransaction.php">Disburment</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/offsetTransaction.php">Journal Entry (CBU)</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/offsetTransactionOthers.php">Journal Entry (Others)</a></li>
            </div>

            <li class="list-unstyled text-muted menu-title">LOAN SERVICE</li>
            <div>
	            <!--<li class="list-unstyled active"><a href="http://system.local/application/views/home/loanService.php">Loan Services</a></li>
	          	<li class="list-unstyled active"><a href="http://system.local/application/views/home/loanServiceEntry.php">New Service</a></li>
	          	<li class="list-unstyled active"><a href="http://system.local/application/views/home/updateLoanServiceEntry.php">Update Service</a></li>-->
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanServiceApplication.php">Loan Application</a></li>
	            <!--<li class="list-unstyled active"><a href="http://system.local/application/views/home/loanServiceApplicationTemp.php">Previous Loan (Flat)</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanServiceApplication_temp.php">Previous Loan (Diminishing)</a></li>-->
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanServiceListTransaction.php">Approve Loan</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/application/views/home/listLoanRelease.php">Release Loan</a></li>
            </div>

            <!--<li class="list-unstyled text-muted menu-title">SAVINGS SERVICE</li>
			<div id = "loanservice">
				<li class="list-unstyled active"><a href="http://system.local/application/views/home/savingsService.php">Savings Services</a></li>
              	<li class="list-unstyled active"><a href="http://system.local/application/views/home/savingsServiceEntry.php">New Service</a></li>
              	<li class="list-unstyled active"><a href="">Update Service</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/savingsServiceApplication.php">Savings Service Application</a></li>
                <li class="list-unstyled active"><a href="">List of Application</a></li>
            </div>

            <li class="list-unstyled text-muted menu-title">SHARE CAPITAL</li>
			<div id = "loanservice">
				<li class="list-unstyled active"><a href="http://system.local/application/views/home/sharecapitalTransaction.php">Deposit Share Capital</a></li>
              	<li class="list-unstyled active"><a href="">Withdraw Share Capital</a></li>
            </div>
    
            <li class="active list-unstyled">
				<a href="#reports">
					<i class="fa fa-list-ol"></i>
					<span> &nbsp </span>
					<span>Reports</span>
				</a>
			</li>
			<div id = "reports">
	            <ul class="list-unstyled">
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Members</a></li>
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Expenses</a></li>
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Loans</a></li>
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Savings</a></li>
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Transactions</a></li>
	            </ul>
            </div>

            <li class="active list-unstyled">
				<a href="#contacts" class="dropdown-toggle card-drop" data-toggle="collapse">
					<i class="fa fa-lightbulb"></i>
					<span> &nbsp </span>
					<span>Contact</span>
				</a>
			</li>
			<div id = "contacts" class="collapse">
	            <ul class="list-unstyled">
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> FAQ</a></li>
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Write Message</a></li>
	              <li class="active"><a href="">  <span> &nbsp&nbsp </span> Contact Info</a></li>
	            </ul>
            </div>

            <li class="active list-unstyled">
				<a href="#about" class="dropdown-toggle card-drop" data-toggle="collapse">
					<i class="fa fa-map-pin"></i>
					<span> &nbsp </span>
					<span>About</span>
				</a>
			</li>-->
			<li class="list-unstyled text-muted menu-title">REPORTS</li>
			<div id = "loanservice">
				<li class="list-unstyled active"><a href="http://system.local/application/views/home/memberSavingsReport.php">Savings Summary</a></li>
				<li class="list-unstyled active"><a href="http://system.local/application/views/home/memberTimeDeposit.php">Time Deposit Summary</a></li>
				<li class="list-unstyled active"><a href="http://system.local/application/views/home/memberFixedDeposit.php">Fixed Deposit Summary</a></li>
              	<li class="list-unstyled active"><a href="http://system.local/application/views/home/memberShareCapitalReport.php">Share Capital Summary</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanRelease.php">Loan Release</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/riceLoanRevenueReport.php">Rice Loan Balance</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanBalance.php">Credit Loan Balance</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/loanAging.php">Loan Aging</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/otherIncomeCR.php">Other Income Cash Register</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/riceCashRevenueReport.php">Trading Cash Register</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/cashierDailyReport.php">Daily Cash Register Report</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/creditOperationReport.php">Daily Disbrsement Report</a></li>
            </div>
  
            <li class="list-unstyled text-muted menu-title">MANAGEMENT</li>
			<div id = "loanservice">
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/generateSOP.php">Generate Statement of Operation</a></li>
                <li class="list-unstyled active"><a href="http://system.local/application/views/home/generateSFC.php">Generate Statement of Financial Condition</a></li>
            </div>


		</div>
</div>
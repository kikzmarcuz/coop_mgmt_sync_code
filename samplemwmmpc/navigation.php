<div class="col-sm-2 fixed-top" style="margin-top: 70px;position: fixed ;">
	<!-- Left Pane (Navigation) -->
		<div>
			<li class="list-unstyled text-muted menu-title">NAVIGATION</li>
			</a></li>

			<!--<div id = "dashboard" class="collapse">
	            <ol class="list-unstyled">
	              <li class="active"><a href="">Dashboard 1</a></li>
	              <li class="active"><a href="">Dashboard 2</a></li>
	            </ol>
            </div>-->
            <div>
				<li class="list-unstyled text-muted menu-title">MEMBER REGISTRATION</li>
	            <li class="list-unstyled active"><a href="http://system.local/plain_view.php">New Member</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/update_member_info.php">Update Member Info</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/listMembers.php">List of Members</a></li>
            </div>

            <?php 
            if ($userAccess == "Manager" or $userAccess == "Developer" or $userAccess == "Bookkeeper" or $userAccess == "Posting officer"){ $displayPropertyUA = "inline"; }else{$displayPropertyUA = "none"; }
            ?>

            <div>
				<li class="list-unstyled text-muted menu-title">LEDGER</li>
	            <li class="list-unstyled active"><a href="http://system.local/view_member_info_temp.php">Member Ledger</a></li>
	            <li style="display: <?php echo $displayPropertyUA;?>" class="list-unstyled active"><a href="http://system.local/view_member_info_temp.php">Account Ledger</a></li>
            </div>

            <li class="list-unstyled text-muted menu-title">TRANSACTION</li>
            <div>
	            <li class="list-unstyled active"><a href="http://system.local/loanPayment.php">Cash Registry</a></li>

	            <li style="display: <?php echo $displayPropertyUA;?>" class="list-unstyled active"><a href="http://system.local/offsetTransaction.php">Offset</a></li><br>

	            <li style="display: <?php echo $displayPropertyUA;?>" class="list-unstyled active"><a href="http://system.local/accountTransaction.php">Account Transaction</a></li>
            </div>

            <li class="list-unstyled text-muted menu-title">LOAN SERVICE</li>
            <div>
	            <!--<li class="list-unstyled active"><a href="http://system.local/loanService.php">Loan Services</a></li>
	          	<li class="list-unstyled active"><a href="http://system.local/loanServiceEntry.php">New Service</a></li>
	          	<li class="list-unstyled active"><a href="http://system.local/updateLoanServiceEntry.php">Update Service</a></li>-->
	            <li class="list-unstyled active"><a href="http://system.local/loanServiceApplication.php">Loan Application</a></li>
	            <!--<li class="list-unstyled active"><a href="http://system.local/loanServiceApplicationTemp.php">Previous Loan (Flat)</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/loanServiceApplication_temp.php">Previous Loan (Diminishing)</a></li>
	            <li class="list-unstyled active"><a href="http://system.local/loanServiceListTransaction.php">Approve Loan</a></li>-->
	            <li class="list-unstyled active"><a href="http://system.local/listLoanRelease.php">Release Loan</a></li>
            </div>

			<li class="list-unstyled text-muted menu-title">REPORTS</li>
			<div id = "loanservice">
				<li class="list-unstyled active"><a href="http://system.local/memberShareCapitalReport.php">Share Capital</a></li>
				<li class="list-unstyled active"><a href="http://system.local/memberSavingsReport.php">Savings Deposit</a></li>
				<li class="list-unstyled active"><a href="http://system.local/memberTimeDeposit.php">Time Deposit</a></li>
				<li class="list-unstyled active"><a href="http://system.local/memberFixedDeposit.php">Fixed Deposit</a></li>
				<li class="list-unstyled active"><a href="http://system.local/loanBalance.php">Loan Balance</a></li>
				<li class="list-unstyled active"><a href="http://system.local/loanAging.php">Loan Aging</a></li>
                <li class="list-unstyled active"><a href="http://system.local/loanRelease.php">Loan Release</a></li>
                <li class="list-unstyled active"><a href="http://system.local/riceLoanRevenueReport.php">Rice Trading</a></li>
                
                <li class="list-unstyled active"><a href="http://system.local/otherIncomeCR.php">Other Income Cash Register</a></li>
                <!--<li class="list-unstyled active"><a href="http://system.local/riceCashRevenueReport.php">Trading Cash Register</a></li>-->
                <li class="list-unstyled active"><a href="http://system.local/cashierDailyReport.php">Cash Register</a></li>
                <li class="list-unstyled active"><a href="http://system.local/creditOperationReport.php">Disbursement</a></li>
                <li class="list-unstyled active"><a href="http://system.local/journalReport.php">Journal Entry</a></li>
                <li class="list-unstyled active"><a href="http://system.local/trial_balance.php">Trial Balance</a></li>
            </div>

            <li style="display: <?php echo $displayPropertyUA;?>" class="list-unstyled text-muted menu-title">MANAGEMENT</li>
			<div style="display: <?php echo $displayPropertyUA;?>" id = "loanservice">
				<li class="list-unstyled active"><a href="http://system.local/view_member_info.php">Account Management</li>
                <li class="list-unstyled active"><a href="http://system.local/generateSOP.php">Statement of Operation</a></li>
                <li class="list-unstyled active"><a href="http://system.local/generateSFC.php">Statement of Financial Condition</a></li>
            </div>


		</div>
</div>
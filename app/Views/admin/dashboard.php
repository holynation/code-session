<!-- main header @s -->
<?php include_once ROOTPATH . 'template/header.php';?>
<!-- main header @e -->

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title page-title">Dashboard</h4>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total User Count</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Customer"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['customer']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-info"><a href="<?=base_url("vc/admin/view_model/customer");?>" class="text-info">All Registered User </a>
                                            <em class="icon ni ni-arrow-long-up text-info"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Verified Users</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Verified Users"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['verifiedCustomer']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-teal"><a href="<?=base_url("vc/admin/view_model/customer?type=verified");?>" class="text-teal">Total Verified Users</a>
                                            <em class="icon ni ni-arrow-long-up text-teal"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Unverified Users</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Unverified Users"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['unverifiedCustomer']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-danger"><a href="<?=base_url("vc/admin/view_model/customer?type=unverified");?>" class="text-danger">Total Unverified Customer</a>
                                            <em class="icon ni ni-arrow-long-up text-danger"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Super Agents</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Superagents"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['superagent']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-pink"><a href="<?=base_url("vc/admin/view_model/superagent");?>" class="text-pink">All Registered Super Agents</a>
                                            <em class="icon ni ni-arrow-long-up text-pink"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Agents</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Agents"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['agent']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-purple"><a href="<?=base_url("vc/create/agent");?>" class="text-purple">All Registered Agents</a>
                                            <em class="icon ni ni-arrow-long-up text-purple"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Verified Agents</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Verified Agents"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['verifiedAgent']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-purple"><a href="<?=base_url("vc/create/agent");?>" class="text-purple">All Verified Agents</a>
                                            <em class="icon ni ni-arrow-long-up text-purple"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->

                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Unverified Agents</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Unverified Agents"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['unverifiedAgent']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-danger"><a href="<?=base_url("vc/create/agent");?>" class="text-danger">All Unverified Agents</a>
                                            <em class="icon ni ni-arrow-long-up text-danger"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Users Gameplay Count</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Users Gameplay"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['customerCashback']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-info"><a href="<?=base_url("vc/admin/view_model/cashback?type=customer");?>" class="text-info">Total Users Gameplay</a>
                                            <em class="icon ni ni-arrow-long-up text-info"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-sm-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Total Agents Gameplay Count</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Agents Gameplay"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount"><?php echo number_format($countData['agentCashback']); ?></span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="text-info"><a href="<?=base_url("vc/admin/view_model/cashback?type=agent");?>" class="text-info">Total Agents Gameplay</a>
                                            <em class="icon ni ni-arrow-long-up text-info"></em>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->

                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDashboardStats" aria-expanded="false" aria-controls="collapseDashboardStats">
                                Show more...
                            </button>
                            <div class="collapse mt-3" id="collapseDashboardStats">
                                <div class="row g-gs">
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Balance</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Wallet Balance"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['walletBalance']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/create/transaction_history");?>" class="text-success">All Wallet Balance</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Balance Users</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Users Balance"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['customerWallet']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/view_model/transaction_history?type=customer");?>" class="text-success">Total Users Balance</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Balance Agents</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Agents Balance"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['agentWallet']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-purple"><a href="<?=base_url("vc/admin/view_model/transaction_history?type=agent");?>" class="text-purple">Total Agents Balance</a>
                                                        <em class="icon ni ni-arrow-long-up text-purple"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Balance Superagents</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Superagents Balance"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['superagentWallet']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-teal"><a href="<?=base_url("vc/admin/view_model/transaction_history?type=superagent");?>" class="text-teal">Total Superagents Balance</a>
                                                        <em class="icon ni ni-arrow-long-up text-teal"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Balance Super Influencer</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Superagents Balance"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['influencerWallet']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-teal"><a href="<?=base_url("vc/admin/view_model/transaction_history?type=influencer");?>" class="text-teal">Total Influencer Wallet Balance</a>
                                                        <em class="icon ni ni-arrow-long-up text-teal"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Balance Promoters</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Superagents Balance"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['promoterWallet']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-teal"><a href="<?=base_url("vc/admin/view_model/transaction_history?type=promoter");?>" class="text-teal">Total Promoter Wallet Balance</a>
                                                        <em class="icon ni ni-arrow-long-up text-teal"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->


                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Winners</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Winners"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo ($countData['alert_winners']); ?> | <?php echo ($countData['jackpot_winners']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/view_model/daily_winner?type=archive");?>" class="text-success">Total Alert | Jackpot Winner</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Stake Amount</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Sales Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['stakecashback']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-info"><a href="<?=base_url("vc/create/cashback");?>" class="text-info">Total Sales Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-info"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Withdrawal</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Sales Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['withdrawalAmount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/withdrawal_request");?>" class="text-success">Total Amount Withdrawn</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Funding Monnify</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Sales Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['monnifyAmount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/payment_transaction?type=monnify");?>" class="text-success">Total Funding Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Wallet Funding Paystack</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Sales Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['paystackAmount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/payment_transaction?type=paystack");?>" class="text-success">Total Funding Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->

                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Pending Payouts</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Pending Payouts"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['pendingPayout']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-danger"><a href="<?=base_url("vc/admin/view_model/withdrawal_request?type=pending");?>" class="text-danger">Total Pending/Processing Payouts</a>
                                                        <em class="icon ni ni-arrow-long-up text-danger"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Pending Disputes</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Pending Disputes"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['pendingDisputes']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-danger"><a href="<?=base_url("vc/create/disputes");?>" class="text-danger">Total Pending Disputes</a>
                                                        <em class="icon ni ni-arrow-long-up text-danger"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->

                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Daily Cashback Count</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Sales Count"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['salesCount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-pink"><a href="<?=base_url("vc/admin/view_model/cashback");?>" class="text-pink">Today's Total Count</a>
                                                        <em class="icon ni ni-arrow-long-up text-pink"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Daily Stake Amount</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Sales Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['salesAmount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/view_model/cashback");?>" class="text-success">Today's Total Sales</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->

                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Daily Check-in Count</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Check-in Count"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['dailyCheckinCount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-purple"><a href="<?=base_url("vc/admin/view_model/cashback?type=checkin");?>" class="text-purple">Total Check-in Count</a>
                                                        <em class="icon ni ni-arrow-long-up text-purple"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Daily Check-in Amount</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Check-in Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['checkinAmountDaily']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-info"><a href="<?=base_url("vc/admin/view_model/cashback?type=checkin");?>" class="text-info">Daily Check-in Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-info"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Check-in Amount</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Check-in Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['checkinAmount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/admin/view_model/cashback?type=checkin");?>" class="text-success">Total Check-in Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->

                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Daily Fastest Finger Count</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Fastest Finger Count"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['dailyfastestFingerCount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-info"><a href="<?=base_url("vc/create/fastest_finger_game");?>" class="text-info">Total Fastest Finger Count</a>
                                                        <em class="icon ni ni-arrow-long-up text-info"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Daily Fastest Finger Amount</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Fastest Finger Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['fastestFingerAmountDaily']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-success"><a href="<?=base_url("vc/create/fastest_finger_game");?>" class="text-success">Daily Fastest Finger Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-success"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Fastest Finger Amount</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Fastest Finger Amount"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount"><?php echo number_format($countData['fastestFingerAmount']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="text-purple"><a href="<?=base_url("vc/create/fastest_finger_game");?>" class="text-purple">Total Fastest Finger Amount</a>
                                                        <em class="icon ni ni-arrow-long-up text-purple"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->

                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Stake Overview</h6>
                                            <p>In last 30 days stakes from Gameplay.</p>
                                        </div>
                                    </div>

                                    <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-xl-wrap">
                                        <!-- this is the contribution chart -->
                                        <div class="nk-sales-ck sales-revenue">
                                            <canvas class="sales-bar-chart" id="daysRevenue"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="col-xl-12">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Client Fund Overview</h6>
                                            <p>In recent year amount from Wallet Funding.</p>
                                        </div>
                                    </div>

                                    <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-xl-wrap">
                                        <!-- this is the contribution chart -->
                                        <div class="nk-sales-ck sales-revenue">
                                            <canvas class="sales-bar-chart" id="mnthRevenue"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->

                         <!-- withdrawal -->
                        <div class="col-xl-12">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start gx-3 mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Total Withdrawal Overview</h6>
                                        </div>
                                    </div>
                                    <!-- this is for the withdrawal -->
                                    <div class="nk-sales-ck large pt-4">
                                        <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->

                        <div class="col-xl-12">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start gx-3 mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Withdrawal Awaiting Approval</h6>
                                        </div>
                                    </div>

                                    <?php if (isset($withdrawalContents)): ?>
                                <div class="table-responsive">
                                    <table class="datatable-init nowrap nk-tb-list is-separate table table-bordered" data-auto-responsive="false">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fullname</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Account Number</th>
                                                <th scope="col">Bank Name</th>
                                                <th scope="col">Date Initiated</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($withdrawalContents as $content): ?>
                                            <tr>
                                                <td><?=$content['fullname'];?></td>
                                                <td scope="row"><?=number_format($content['total_amount'], 2);?></td>
                                                <td><?=$content['account_number'];?></td>
                                                <td><?=$content['bank_name'];?></td>
                                                <td><?=$content['date_created'];?></td>
                                                <td>
                                                    <?php
$customer = strtolower($content['made_by']);
?>
                                                    <div class="mb-2">
                                                        <ul>
                                                            <li data-ajax='1' data-critical='1'>
                                                                <a href="<?=base_url("changestatus/withdrawal_request/approved/{$content['ID']}?made_by={$customer}&reference={$content['reference']}");?>" class="btn btn-primary" onclick='loadAjaxCritical($(this));return false;'>Approved</a>
                                                            </li>
                                                       </ul>
                                                    </div>
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li  data-ajax='0' data-critical='0'>
                                                                            <a href='<?=base_url("vc/admin/view_more/profile/withdrawal/{$content['ID']}?made_by={$customer}&reference={$content['reference']}");?>'><em class="icon ni ni-report"></em><span>User Details</span></a>
                                                                        </li>
                                                                        <li data-ajax='1' data-critical='1'>
                                                                            <a href='<?=base_url("changestatus/withdrawal_request/failed/{$content['ID']}?made_by={$customer}&reference={$content['reference']}");?>' onclick='loadAjaxCritical($(this));return false;'><em class="icon ni ni-cross"></em><span>Cancel Request</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif;?>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->


<?php
$cashbackDistrix[0] = json_encode(@$cashbackDistrix[0]);
$cashbackDistrix[1] = json_encode(@$cashbackDistrix[1]);

$fundDistrix[0] = json_encode(@$fundDistrix[0]);
$fundDistrix[1] = json_encode(@$fundDistrix[1]);

// withdrawal
$withdrawalDistrix[0] = json_encode(@$withdrawalDistrix[0]);
$withdrawalDistrix[1] = json_encode(@$withdrawalDistrix[1]);

?>

<!-- JavaScript -->
<?php include_once ROOTPATH . 'template/footer.php';?>

<script type="text/javascript">
    "use strict";
!function (NioApp, $) {
    let data2 = JSON.parse('<?php echo $cashbackDistrix[0]; ?>'); // cashback days
    let data3 = JSON.parse('<?php echo $cashbackDistrix[1]; ?>');

    let data4 = JSON.parse('<?php echo $fundDistrix[0]; ?>'); // fund mnth
    let data5 = JSON.parse('<?php echo $fundDistrix[1]; ?>');

    let data6 = JSON.parse('<?php echo $withdrawalDistrix[0]; ?>'); // withdrawal mnth
    let data7 = JSON.parse('<?php echo $withdrawalDistrix[1]; ?>');

    var daysRevenue = {
        labels: data2,
        dataUnit: 'STAKE',
        stacked: true,
        datasets: [{
          label: "Cashback",
          color: [NioApp.hexRGB("#5CE0AA", .4), NioApp.hexRGB("#5CE0AA", .4), NioApp.hexRGB("#5CE0AA", .4), NioApp.hexRGB("#5CE0AA", .4), NioApp.hexRGB("#5CE0AA", .4), "#5CE0AA"],
          data: data3
        }]
    };

    var mnthRevenue = {
        labels: data4,
        dataUnit: 'NGN',
        stacked: true,
        datasets: [{
          label: "Fund Overview",
          color: [NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), NioApp.hexRGB("#8cefd4", .4), "#8cefd4"],
          data: data5
        }]
    };

    function salesBarChart(selector, set_data) {
        var $selector = selector ? $(selector) : $('.sales-bar-chart');
        $selector.each(function () {
          var $self = $(this),
              _self_id = $self.attr('id'),
              _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data,
              _d_legend = typeof _get_data.legend === 'undefined' ? false : _get_data.legend;

          var selectCanvas = document.getElementById(_self_id).getContext("2d");
          var chart_data = [];

          for (var i = 0; i < _get_data.datasets.length; i++) {
            chart_data.push({
              label: _get_data.datasets[i].label,
              data: _get_data.datasets[i].data,
              // Styles
              backgroundColor: _get_data.datasets[i].color,
              borderWidth: 2,
              borderColor: 'transparent',
              hoverBorderColor: 'transparent',
              borderSkipped: 'bottom',
              barPercentage: .7,
              categoryPercentage: .7
            });
          }

          var chart = new Chart(selectCanvas, {
            type: 'bar',
            data: {
              labels: _get_data.labels,
              datasets: chart_data
            },
            options: {
              legend: {
                display: _get_data.legend ? _get_data.legend : false,
                rtl: NioApp.State.isRTL,
                labels: {
                  boxWidth: 30,
                  padding: 20,
                  fontColor: '#6783b8'
                }
              },
              maintainAspectRatio: false,
              tooltips: {
                enabled: true,
                rtl: NioApp.State.isRTL,
                callbacks: {
                  title: function title(tooltipItem, data) {
                    return false;
                  },
                  label: function label(tooltipItem, data) {
                    return data['labels'][tooltipItem['index']] + ' - ' + data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                  }
                },
                backgroundColor: '#1c2b46',
                titleFontSize: 13,
                titleFontColor: '#fff',
                titleMarginBottom: 4,
                bodyFontColor: '#fff',
                bodyFontSize: 12,
                bodySpacing: 10,
                yPadding: 12,
                xPadding: 12,
                footerMarginTop: 0,
                displayColors: false
              },
              scales: {
                yAxes: [{
                  display: false,
                  stacked: _get_data.stacked ? _get_data.stacked : false,
                  ticks: {
                    beginAtZero: true
                  }
                }],
                xAxes: [{
                  display: false,
                  stacked: _get_data.stacked ? _get_data.stacked : false,
                  ticks: {
                    reverse: NioApp.State.isRTL
                  }
                }]
              }
            }
          });
        });
    } // init chart

    NioApp.coms.docReady.push(function () {
        salesBarChart();
    }); // end

    // this is for withdraw chart
    var salesOverview = {
        labels: data6,
        dataUnit: 'NGN',
        lineTension: 0.4,
        datasets: [{
          label: "withdrawal Overview",
          color: "#42f4aa",
          background: NioApp.hexRGB('#8cefd4', .35),
          data: data7
        }]
    };

    function lineSalesOverview(selector, set_data) {
        var $selector = selector ? $(selector) : $('.sales-overview-chart');
        $selector.each(function () {
          var $self = $(this),
              _self_id = $self.attr('id'),
              _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

          var selectCanvas = document.getElementById(_self_id).getContext("2d");
          var chart_data = [];

          for (var i = 0; i < _get_data.datasets.length; i++) {
            chart_data.push({
              label: _get_data.datasets[i].label,
              tension: _get_data.lineTension,
              backgroundColor: _get_data.datasets[i].background,
              borderWidth: 4,
              borderColor: _get_data.datasets[i].color,
              pointBorderColor: "transparent",
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: _get_data.datasets[i].color,
              pointBorderWidth: 4,
              pointHoverRadius: 6,
              pointHoverBorderWidth: 4,
              pointRadius: 6,
              pointHitRadius: 6,
              data: _get_data.datasets[i].data
            });
          }

          var chart = new Chart(selectCanvas, {
            type: 'line',
            data: {
              labels: _get_data.labels,
              datasets: chart_data
            },
            options: {
              legend: {
                display: _get_data.legend ? _get_data.legend : false,
                rtl: NioApp.State.isRTL,
                labels: {
                  boxWidth: 30,
                  padding: 20,
                  fontColor: '#6783b8'
                }
              },
              maintainAspectRatio: false,
              tooltips: {
                enabled: true,
                rtl: NioApp.State.isRTL,
                callbacks: {
                  title: function title(tooltipItem, data) {
                    return data['labels'][tooltipItem[0]['index']];
                  },
                  label: function label(tooltipItem, data) {
                    return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                  }
                },
                backgroundColor: '#1c2b46',
                titleFontSize: 13,
                titleFontColor: '#fff',
                titleMarginBottom: 4,
                bodyFontColor: '#fff',
                bodyFontSize: 12,
                bodySpacing: 10,
                yPadding: 12,
                xPadding: 12,
                footerMarginTop: 0,
                displayColors: false
              },
              scales: {
                yAxes: [{
                  display: true,
                  stacked: _get_data.stacked ? _get_data.stacked : false,
                  position: NioApp.State.isRTL ? "right" : "left",
                  ticks: {
                    beginAtZero: true,
                    fontSize: 11,
                    fontColor: '#9eaecf',
                    padding: 10,
                    callback: function callback(value, index, values) {
                      return '$ ' + value;
                    },
                    min: 100,
                    stepSize: 3000
                  },
                  gridLines: {
                    color: NioApp.hexRGB("#526484", .2),
                    tickMarkLength: 0,
                    zeroLineColor: NioApp.hexRGB("#526484", .2)
                  }
                }],
                xAxes: [{
                  display: true,
                  stacked: _get_data.stacked ? _get_data.stacked : false,
                  ticks: {
                    fontSize: 9,
                    fontColor: '#9eaecf',
                    source: 'auto',
                    padding: 10,
                    reverse: NioApp.State.isRTL
                  },
                  gridLines: {
                    color: "transparent",
                    tickMarkLength: 0,
                    zeroLineColor: 'transparent'
                  }
                }]
              }
            }
          });
        });
    } // init chart

    NioApp.coms.docReady.push(function () {
        lineSalesOverview();
    }); // end
}(NioApp, jQuery);
</script>
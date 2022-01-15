<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $strRealName ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>


          <!-- DASHBOARD -->
        <?php if(in_array("1",$permissions)){ ?>
        <li>
          <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          <?php } else ?>




            <!-- POINT OF SALE -->
          <?php if(in_array("2",$permissions)){ ?>
        <li>
          <a href="pos">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
             <span> Point of sale</span>
          </a>
        </li>
        <?php } ?>




            <!-- SELL -->
        <?php if(in_array("3",$permissions)){ ?>
        <li class="treeview">
          <a href="Sell">
          <i class="fa fa-exchange" aria-hidden="true"></i>

            <span>Sell</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Sell List</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Return List</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Sell Log</a></li>
          </ul>
        </li>
        <?php } ?>


          <!-- qutation -->
          <?php if(in_array("4",$permissions)){ ?>
        <li class="treeview">
          <a href="Sell">
          <i class="fa fa-id-card-o" aria-hidden="true"></i>
            <span>Quotation</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add Quotation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Quotation List</a></li>
          </ul>
        </li>
        <li>
        <?php } ?>


        <!-- INSTALLMENT -->
        <?php if(in_array("5",$permissions)){ ?>
        <li class="treeview">
          <a href="Sell">
          <i class="fa fa-balance-scale" aria-hidden="true"></i>
            <span>Installment</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Installment List</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Payment List</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Payment Due today</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Payment due all</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Payment due expired</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Overview report</a></li>
          </ul>
        </li>
        <?php } ?>



        <!-- PURCHASE -->
        <?php if(in_array("6",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <span>Purchase</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add purchase</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Purchase List</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Due invoice</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Return list</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Purchase logs</a></li>
          </ul>
        </li>
        <?php } ?>



        <!-- TRANSFER -->
        <?php if(in_array("7",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-rocket" aria-hidden="true"></i>
            <span>Transfer</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add transfer</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Transfer List</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Receive list</a></li>
          </ul>
        </li>
        <?php } ?>



        <!-- PRODUCTS -->
        <?php if(in_array("8",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <span>Products</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add product</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Barcode print</a></li>
            <li><a href="index.php?catgoryList"><i class="fa fa-circle-o"></i> Category list</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add transfer</a></li>
            <li><a href="index.php?addMainCategory"><i class="fa fa-circle-o"></i> Add category</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Import</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Stock Alert</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Expired</a></li>
          </ul>
        </li>
        <?php } ?>




        <!-- CUSTOMERS -->
        <?php if(in_array("9",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-users" aria-hidden="true"></i>
            <span>Customers</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add customer</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Customer list</a></li>
          </ul>
        </li>
        <?php } ?>




        <!-- SUPPLIERS -->
        <?php if(in_array("10",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-truck" aria-hidden="true"></i>
            <span>Suppliers</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add suppliers</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Suppliers list</a></li>
          </ul>
        </li>
        <?php } ?>




        <!-- ACCOUNTING -->
        <?php if(in_array("11",$permissions)){ ?>
        <li class="treeview">
          <a href="accounting">
          <i class="fa fa-university" aria-hidden="true"></i>
            <span>Accounting</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Deposit</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Widthdraw</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Transaction list</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Add transfer</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Transfer list</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Add bank account</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Bank account list</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Income source</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Balance sheet</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Income monthwise</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Expense monthwise</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Income Vs Expense</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Profit Vs Loss</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Cashbook</a></li>
          </ul>
        </li>
        <?php } ?>





        <!-- EXPENDITURE -->
        <?php if(in_array("12",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-etsy" aria-hidden="true"></i>
            <span>Expenditure</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add expense</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Expense list</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add category</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Category list</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Expense monthwise</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Summary</a></li>
          </ul>
        </li>
        <?php } ?>





        <!-- LOAN MANAGER -->
        <?php if(in_array("13",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-usd" aria-hidden="true"></i>
            <span>Loan Manager</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Loan list</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Take loan</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Summary</a></li>
          </ul>
        </li>
        <?php } ?>





        <!-- REPORTS -->
        <?php if(in_array("14",$permissions)){ ?>
        <li class="treeview">
          <a href="accounting">
          <i class="fa fa-file" aria-hidden="true"></i>
            <span>Reports</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Overview report</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Collection report</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Due collection RPT</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Due paid RPT</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Sell report</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Purchase report</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Sell payment report</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> PUR. Payment RPT</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Sell tax report</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Purchase tax RPT</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Tax overview report</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Report stock</a></li>
          </ul>
        </li>
        <?php } ?>





        <!-- ANALYTICS -->
        <?php if(in_array("15",$permissions)){ ?>
        <li>
          <a href="analytics">
          <i class="fa fa-line-chart" aria-hidden="true"></i> <span>Analytics</span>
          </a>
        </li>
        <?php } ?>
        





        <!-- USERS -->
        <?php if(in_array("16",$permissions)){ ?>
        <li class="treeview">
          <a href="purchase">
          <i class="fa fa-users" aria-hidden="true"></i>
            <span>Users</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add user</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> User list</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add usergroup</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Usergroup list</a></li>
          </ul>
        </li>
        <?php } ?>






        <!-- SYSTEM -->
        <?php if(in_array("17",$permissions)){ ?>
        <li class="treeview">
          <a href="system">
          <i class="fa fa-cogs" aria-hidden="true"></i>
            <span>System</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Store</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Receipt template</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> User preference</a></li>
            <li><a href="index.php?brand"><i class="fa fa-circle-o"></i> Brand</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Currency</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Pmethod</a></li>
            <li><a href="index.php?uom"><i class="fa fa-circle-o"></i> Unit</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Tax Rate</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Printer</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Box</a></li>
          </ul>
        </li>
        <?php } ?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
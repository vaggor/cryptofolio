
<h2 class="page-title">Trades <small><?php echo $page; ?></small></h2>
        <div class="row">
         

        <center style=" margin-bottom:10px;"><?php echo $this->Session->flash(); ?></center>
		<section class="widget widget-tabs">
                    <div class="body tab-content">
                    <div class="form-group">
                        <div style="margin-left: 10px; margin-bottom: 10px;">
                         <?php echo $this->Html->link('<button class="btn btn-lg btn-info">New Trade</button>',array('controller'=>'tradings','action'=>'buy'),array('escape'=>false)); ?>
                         </div>
                        <div id="buy" class="tab-pane active clearfix">
                            <section class="widget">
                    <header>
                        <h4>My Trades</h4>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>                        </div>
                    </header>
                    <div class="widget-table-overflow">
                        <table class="table table-striped table-lg mt-sm mb-0 sources-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Exchange</th>
                                <th>Symbol</th>
                                <th>Order ID</th>
                                <th>Buy Price</th>
                                <th>Quantity</th>
                                <th>Buy Date</th>
                                <th>Sell Price</th>
                                <th>Sell Date</th>
                                <th>% Profit</th>
                                <th>Profit</th>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i = 1;
                            foreach($data as $data){ 
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $lexch[$data['RobotTrade']['exchange_id']];  ?></td>
                                <td><?php echo $data['RobotTrade']['symbol'];  ?></td>
                                <td><?php echo $data['RobotTrade']['buy_orderId'];  ?></td>
                                <td><?php echo $data['RobotTrade']['buy_price'];  ?></td>
                                <td><?php echo $data['RobotTrade']['buy_qty'];  ?></td>
                                <td><?php echo date('d M,Y H:i',strtotime($data['RobotTrade']['buy_time'])) ?></td>
                                <td><?php if($data['RobotTrade']['status'] == 5){echo $data['RobotTrade']['sell_price'];}  ?></td>
                                <td><?php if($data['RobotTrade']['status'] == 5){echo date('d M,Y H:i',strtotime($data['RobotTrade']['sell_time']));} ?></td>
                                <td><strong class="<?php if($data['RobotTrade']['perc_profit'] >= 0){echo 'color-green';}else{echo 'color-red';} ?>"><?php echo round($data['RobotTrade']['perc_profit'],2);  ?> %</strong></td>
                                <td><strong class="<?php if($data['RobotTrade']['profit'] >= 0){echo 'color-green';}else{echo 'color-red';} ?>"><?php echo $data['RobotTrade']['profit'];  ?></strong></td>
                                
                                <td>
                                <?php if($data['RobotTrade']['status'] == 4){ ?>
                                <div class="col-md-8 col-md-offset-2">
                                    <?php echo $this->Html->link('<button class="btn btn-lg btn-warning">Sell</button>',array('controller'=>'tradings','action'=>'sell',$data['RobotTrade']['id']),array('escape'=>false,'confirm'=>'Are you sure you want to sell '.$data['RobotTrade']['symbol'])); ?>
                                </div>
                                <?php } ?>
                            </td>
                            
                            </tr>
                            <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                        </div>
                       
                       
                    </div>
              </section>


             
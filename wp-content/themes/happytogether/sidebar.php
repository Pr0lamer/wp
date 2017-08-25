<div class="col-md-4">
<aside class="sidebar">
    <?php dynamic_sidebar('sidebar'); ?>
                    

                    <!-- Resent posts -->
                    <section class="widget resent-posts">
                        <h4>Resent posts</h4>
                    
                        <div class="tab-wrapp">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#today" aria-controls="today" role="tab" data-toggle="tab">Today</a></li>
                                <li role="presentation"><a href="#week" aria-controls="week" role="tab" data-toggle="tab">Week</a>
                                </li>
                                <li role="presentation"><a href="#month" aria-controls="month" role="tab" data-toggle="tab">Month</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="today">
                                <?php today_posts(); ?>
                                </div>

                            

                                <div role="tabpanel" class="tab-pane" id="week">

                                   <?php wpb_last_week_posts(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="month">
                                    <?php last_month_posts(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
               </aside>
            </div>
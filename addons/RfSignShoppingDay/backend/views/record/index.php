<?php

use yii\widgets\LinkPager;
use common\helpers\AddonUrl;

$this->title = '中奖记录';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= $this->title; ?></h5>
                <div class="ibox-tools">
                    <a class="btn btn-primary btn-xs" href="<?= AddonUrl::to(['export'])?>"><i class="fa fa-mail-forward"></i>  导出记录</a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>用户昵称</th>
                        <th>奖品名称</th>
                        <th>奖品类型</th>
                        <th>创建时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $model){ ?>
                        <tr id = <?= $model->id; ?>>
                            <td><?= $model->id; ?></td>
                            <td><?= $model->user->nickname; ?></td>
                            <td><?= $model->award_title; ?></td>
                            <td><?= $model->award_cate_id == 1 ? '<span class="label label-primary">积分</span>' : '<span class="label label-info">卡卷</span>'; ?></td>
                            <td><?= Yii::$app->formatter->asDatetime($model->created_at); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <?= LinkPager::widget([
                            'pagination' => $pages,
                            'maxButtonCount' => 5,
                            'firstPageLabel' => "首页",
                            'lastPageLabel' => "尾页",
                            'nextPageLabel' => "下一页",
                            'prevPageLabel' => "上一页",
                        ]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
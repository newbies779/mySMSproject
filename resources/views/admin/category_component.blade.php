<div class="col-sm-10 offset-sm-1 pull-xs-center" id="header-button">
    <!-- Button trigger modal -->
    <button id="button-new" class="btn btn-primary btn-block hvn-btn-shadow-outset" role="button">
        <span style="margin-top: 10px;">
            <b>
                NEW
            </b>
        </span>
    </button>
    <div class="new-contextmenu card card-block shadow list-group">
        <a class="list-group-item list-group-item-action pull-sm-right" data-toggle="modal" href="#adminAddNew"><i class="fa fa-plus-square fa-lg pull-sm-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;Item </a>
        <a class="list-group-item list-group-item-action pull-sm-right" data-toggle="modal" href="#adminNewCate"><span class="pull-sm-left"><i class="fa fa-tags fa-lg"><i class="fa fa-plus"></i></i></span>&nbsp;&nbsp;&nbsp;&nbsp;Category </a>
    </div>
</div>
<?php $i = 1; ?>
<div class="card panel-shadow content list-group">
    <div class="card-block shadow">          
        <h5 class="card-title text-sm-left">Category</h5>
    </div>
    <div href="#" class="list-group-item list-group-item-action showall">
        <label> Show All </label>
    </div>

    @foreach ($categories as $category)
    <div class="list-group-item list-group-item-action cate_hover">
        <div class="row">
            <label class="pull-sm-left" style="max-width: 17ch;
        word-wrap:break-word;
        display: inline-block;
        text-overflow: ellipsis;
        overflow:hidden;"><?= $category->name ?></label>
        
        <button class="btn pull-xs-right categoryEdit" style="font-size: 6px;background-color: #5c90d2;" data-toggle="modal" href="#adminEditCategory" data-category='<?= str_replace('\'', '\\\'', $category); ?>'><i class="fa fa-cog" aria-hidden="true" style="font-size:10px;color:white"></i></button>
        </div>
    </div>
    @endforeach
</div> 
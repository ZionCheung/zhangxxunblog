<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    // index
    '' => 'index/index/index',
    'study' => 'index/study/study',
    'heart' => 'index/heart/heart',
    'noisylife' => 'index/noisylife/noisylife',
    'aboutme' => 'index/aboutme/aboutme',
    'aclemore' => 'index/aclemore/aclemore',
    'article/:cate/:serial' => 'index/details/details',
    'article/click' => 'index/details/articleClick',
    'article/like' => 'index/details/articleLike',
    'article/comment' => 'index/details/articleComment',
    'comment/like' => 'index/details/articleCommentLike',
    'aboutme/message' => 'index/aboutme/addMessage',
    // admin
    'zhangxxun' => 'admin/index/index',
    'zhangxxun/login' => 'admin/login/login',
    'loginhandle' => 'admin/login/loginhandle',
    'logincode' => 'admin/login/codeHandle',
    'loginout' => 'admin/index/loginout',
    'zhangxxun/home' => 'admin/home/home',
    //cate
    'zhangxxun/cate' => 'admin/webcate/cate',
    'addcate' => 'admin/webcate/addcate',
    'zhangxxun/addcatehandle' => 'admin/webcate/addcatehandle',
    'zhangxxun/catenamehandle' => 'admin/webcate/cateNameHandle',
    'zhangxxun/catedelete' => 'admin/webcate/deleteHandle',
    'updatecate/:id' => 'admin/webcate/updatecate',
    'zhangxxun/updatecate' => 'admin/webcate/upDateCateHandle',
    'zhangxxun/updatesort' => 'admin/webcate/upDateSortHandle',
    // auth
    'zhangxxun/rule' => 'admin/rule/rule',
    'zhangxxun/addrule' => 'admin/rule/addrule',
    'zhangxxun/addRuleHandle' => 'admin/rule/addRuleHandle',
    'zhangxxun/deleterule' => 'admin/rule/deleteRule',
    'updaterule/:id' => 'admin/rule/updateRule',
    'zhangxxun/updaterulehandle' => 'admin/rule/updateRuleHandle',
    'zhangxxun/updataOnOffRule' => 'admin/rule/updataOnOffRule',
    'zhangxxun/role' => 'admin/role/role',
    'zhangxxun/addrole' => 'admin/role/addrole',
    'zhangxxun/addRoleHandle' => 'admin/role/addRoleHandle',
    'zhangxxun/deleterole' => 'admin/role/deleterole',
    'zhangxxun/updateOnOffRole' => 'admin/role/updateOnOffRole',
    'updateRole/:id' => 'admin/role/updaterole',
    'zhangxxun/updaterolehandle' => 'admin/role/updaterolehandle',
    // adminuser
    'zhangxxun/user' => 'admin/adminuser/adminuser',
    'zhangxxun/adduser' => 'admin/adminuser/addadminuser',
    'zhangxxun/addAdminUserHandle' => 'admin/adminuser/addAdminUserHandle',
    'zhangxxun/deleteuser' => 'admin/adminuser/deleteAdminUser',
    'zhangxxun/status' => 'admin/adminuser/updateUserOnOff',
    'updateuser/:uid' => 'admin/adminuser/updateUser',
    'zhangxxun/updatehead' => 'admin/adminuser/updateHeadHandle',
    'zhangxxun/updateuser' => 'admin/adminuser/updateUserHandle',
    'zhangxxun/useraccess' => 'admin/adminuser/adAccess',
    'adduseraccess/:uid' => 'admin/adminuser/addUserAccess',
    'zhangxxun/addUserAccessHandle' => 'admin/adminuser/addUserAccessHandle',
    // banner
    'zhangxxun/banner' => 'admin/banner/banner',
    'zhangxxun/addbanner' => 'admin/banner/addbanner',
    'zhangxxun/addBannerImgHandle' => 'admin/banner/addBannerImgHandle',
    'zhangxxun/bannerImg' => 'admin/banner/bannerImg',
    'zhangxxun/addbannerhandle' => 'admin/banner/addBannerHandle',
    'zhangxxun/bannerOnOff' => 'admin/banner/bannerOnOff',
    'zhangxxun/deleteBanner' => 'admin/banner/deleteBanner',
    'bannerpre/:cid' => 'admin/banner/bannerpreview',
    'bannerUpdate/:id' => 'admin/banner/bannerUpdate',
    'zhangxxun/breupdate' => 'admin/banner/bannerupdatehandle',
    'zhangxun/breSort' => 'admin/banner/bannerOrderUpdate',
    // Article
    'zhangxxun/article' => 'admin/article/article',
    'zhangxxun/addarticle' => 'admin/article/addArticle',
    'zhangxxun/articleNameValidation' => 'admin/article/articleNameValidation',
    'zhangxxun/articleCoverMapHandle' => 'admin/article/articleCoverMapHandle',
    'zhangxxun/addariclehandle' => 'admin/article/articleAddHandle',
    'zhangxxun/articledata' => 'admin/article/articleData',
    'articlePreView/:number' => 'admin/article/articlePreView',
    'zhangxxun/articleDelete' => 'admin/article/articleDelete',
    'zhangxxun/articleRecycleBin' => 'admin/article/articleRecycleBin',
    'articleUpDate/:aid/:serial' => 'admin/article/articleUpDate',
    'zhangxxun/articleUpDateHandle' => 'admin/article/articleUpDateHandle',
    'zhangxxun/articleSign' => 'admin/article/articleSign',
    'zhangxxun/articleSort' => 'admin/article/articleSort',
    'zhangxxun/articleRecycleBinList' => 'admin/article/articleRecycleBinList',
    'zhangxxun/articleRecovery' => 'admin/article/articleRecovery',
    // tags
    'zhangxxun/tags' => 'admin/tags/tags',
    'zhangxxun/addtags' => 'admin/tags/addtags',
    'zhangxxun/addTagsHandle' => 'admin/tags/addTagsHandle',
    'zhangxxun/tagsSort' => 'admin/tags/tagsSort',
    'zhangxxun/tagssign' => 'admin/tags/tagssign',
    'zhangxxun/tagsDelete' => 'admin/tags/tagsDelete',
    'tagsUpdate/:id' => 'admin/tags/tagsUpdate',
    'zhangxxun/updatetagshandle' => 'admin/tags/updateTagsHandle',
]; 

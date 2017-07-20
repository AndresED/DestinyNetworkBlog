function  searchUser()
{
    var resultadoBusqueda=$("#list-user");
    var route ="searchUser/ "
    route ="searchUser/"+$("#search_User").val();
    resultadoBusqueda.empty();
    $.get(route,function(users)
    {
        $(users).each(function(key,resp_user){
        resultadoBusqueda.append('<li><img src="'+resp_user.user_avatar+'" alt="'+resp_user.user_nicename+'"><a class="users-list-name" href="../profile/'+resp_user.user_slug+'">'+resp_user.user_nicename+'</a><span class="users-list-date">'+resp_user.created_at+'</span></li>');
        });
    });
}
function  searchPost_admin()
{
    var resultadoBusqueda=$("#list-post");
    var route ="searchPost/ "
    route ="searchPost/"+$("#search_post").val();
    resultadoBusqueda.empty();
    $.get(route,function(posts)
    {
        $(posts).each(function(key,resp_post){
        resultadoBusqueda.append('<tr><td style="padding: 2em">'+resp_post.id+'</td><td style="padding: 2em">'+resp_post.post_title.substring(0,20)+'</td><td style="padding: 2em">'+resp_post.post_content.substring(0,70)+'</td><td style="padding: 2em">'+resp_post.created_at+'</td><td style="padding: 2em;"><a href="admin/posts/'+resp_post.id+'/edit"><button type="button" class="btn btn-info" style=" font-size: 14px; padding: 4px 8px;"><i class="fa fa-pencil"></i></button></a><a href="admin/posts/'+resp_post.id+'/destroy"><button type="button" class="btn btn-danger" style=" font-size: 14px; padding: 4px 8px;"><i class="fa fa-trash-o"></i></button></a></td></tr>');
        });
    });
}
function  searchGame_admin()
{
    var resultadoBusqueda=$("#list-game");
    var route ="searchGame/ "
    route ="searchGame/"+$("#search_game").val();
    resultadoBusqueda.empty();
    $.get(route,function(games)
    {
        $(games).each(function(key,resp_game){
        resultadoBusqueda.append('<tr><td style="padding: 2em">'+resp_game.id+'</td><td style="padding: 2em">'+resp_game.game_name.substring(0,20)+'</td><td style="padding: 2em">'+resp_game.game_description.substring(0,70)+'</td><td style="padding: 2em">'+resp_game.created_at+'</td><td style="padding: 2em;"><a href="/admin/posts/'+resp_game.id+'/edit"><button type="button" class="btn btn-info" style=" font-size: 14px; padding: 4px 8px;"><i class="fa fa-pencil"></i></button></a><a href="/admin/posts/'+resp_game.id+'/destroy"><button type="button" class="btn btn-danger" style=" font-size: 14px; padding: 4px 8px;"><i class="fa fa-trash-o"></i></button></a></td></tr>');
        });
    });
}
function filtrar_post()
{
    //searchAllPost();
    gameP =$("#gameP").val();
    autorP =$("#autorP").val();
    tituloP =$("#tituloP").val();
    // 0 0 0
    if(gameP=="-1"&&autorP=="-1"&&tituloP!="")
    {
        searchAllPost("nothing","","","");
    }
    // 0 0 1
    if(gameP=="-1"&&autorP=="-1"&&tituloP!="")
    {
        searchAllPost("onlyT","","",tituloP);
    }
    // 0 1 0
    if(gameP=="-1"&&autorP!="-1"&&tituloP=="")
    {
        searchAllPost("onlyA","",autorP,"");
    }
    // 0 1 1
    if(gameP=="-1"&&autorP!="-1"&&tituloP!="")
    {
        searchAllPost("at","",autorP,tituloP);
    }
    // 1 0 0
    if(gameP!="-1"&&autorP=="-1"&&tituloP=="")
    {
        searchAllPost("onlyG",gameP,"","");
    }
    // 1 0 1
    if(gameP!="-1"&&autorP=="-1"&&tituloP!="")
    {
        searchAllPost("gt",gameP,"",tituloP);
    }
    // 1 1 0
    if(gameP!="-1"&&autorP!="-1"&&tituloP=="")
    {
        searchAllPost("ga",gameP,autorP,"");
    }
    // 1 1 1
    if(gameP!="-1"&&autorP=="-1"&&tituloP!="")
    {
        searchAllPost("all",gameP,autorP,tituloP);
    }
}

function searchAllPost($type,$vg,$va,$vt)
{
    var resultadoBusqueda=$("#timeline");
    var route="";
    if($type=="nothing")
    {
        route ="searchAllPost";
    }
    if($type=="onlyT")
    {
        route ="searchAllPostTittle/"+$vt;
    }
    if($type=="onlyA")
    {
        route ="searchAllPostAuthor/"+$va;
    }
    if($type=="at")
    {   
        route ="searchAllPostAuthorTittle/"+$va+"/"+$vt;
    }
    if($type=="onlyG")
    {
        route ="searchAllPostGame/"+$vg;
    }
    if($type=="gt")
    {
        route ="searchAllPostGameTittle/"+$vg+"/"+$vt;
    }
    if($type=="ga")
    {
        route ="searchAllPostGameAuthor/"+$vg+"/"+$va;
    }
    if($type=="all")
    {
        route ="searchAllPostD/"+$vg+"/"+$va+"/"+$vt;
    }
    resultadoBusqueda.empty();
    $.get(route,function(post)
    {
         $(post).each(function(key,resp_post){
            var route_count ="searchAllPostCount/"+resp_post.id;
            $.get(route_count,function(post_count){
                resultadoBusqueda.append('<li><div class="timeline-badge primary"></div><div class="timeline-panel"><div class="timeline-heading"><h4><a href="posts/'+resp_post.post_slug+'"><i class="fa fa-graduation-cap"></i>'+resp_post.post_title+'</a></h4><img class="full-width" src="'+resp_post.post_img+'" alt="'+resp_post.post_title+'"/></div><div class="timeline-body"><p>'+resp_post.post_content+'</p></div><div class="timeline-footer"><i class="fa fa-calendar-o"></i>'+resp_post.created_at+'<a class="pull-right"><i class="fa fa-comments"></i>'+post_count+'</a></a></div></div></li>');            
            });
         });
        
    });
}

const app = {

    urlPosts : "https://jsonplaceholder.typicode.com/posts",
    urlComments : "https://jsonplaceholder.typicode.com/comments",
    urlUsers : "https://jsonplaceholder.typicode.com/users",

    userId : "",
    keyWord : "",

    loadPosts : async function(){
        //const cont = document.querySelector("#content")
        const cont = $("#content")
        cont.css("width","100%")
        cont.addClass("mx-auto mt-5")
        let html = ""

        let urlaux = ""
        if(this.userId !== ""){
            urlaux = "?userId=" + this.userId
        }
        
        //peticion tipo GET
        let r = await fetch (this.urlUsers)
                .then( Response => Response.json())
                .catch(err => console.error("Se produjo un error: ",err ))
        fetch(this.urlPosts + urlaux)
            .then( Response => Response.json())
            .then( posts => {
                for(let post of posts){
                    if(post.body.indexOf(this.keyWord) != -1){
                        html += `
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${ post.title }</h5>
                                <h6 class="card-subtitle text-muted">${ r[post.userId-1].name}</h6>
                                <p class="card-text">${ post.body }</p>
                            </div>
                            <div class="card-footer text-body-secondary">
                                <button class="btn btn-light" type="button"
                                    id="btn-ver-com${ post.id }"
                                    onclick = "app.loadComment(${ post.id })">
                                    Ver Comentarios <i class="bi bi-arrow-down"></i>
                                </button>
                                <button class="btn btn-light d-none" type="button"
                                    id="btn-cer-com${ post.id }"
                                    onclick = "app.closeComment(${ post.id })">
                                    Cerrar Comentarios <i class="bi bi-arrow-up-circle"></i>
                                </button>
                                <div class="spinner-border text-primary d-none float-end"
                                    id="loading${post.id}" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <div class="card d-none" id="card-com${post.id}">
                                    <ul class="list-group list-group-flush" id="comments${post.id}"></ul>
                                </div>
                            </div>
                        </div>
                        `
                    }
                }
                cont.html(html)
            }).catch (err => console.error("Se produjo un error: ",err))
    },
    loadUsers : function(){
        const users = $("#autores")
        let html = ""
        users.html(html)
        fetch(this.urlUsers)
            .then( resp => resp.json())
            .then(usrs => {
                for(let u of usrs){
                    html += `
                        <button type="button"
                            class="list-group-item list-group-item-action"
                            id="up${ u.id }"
                            onclick="app.userPosts(${ u.id } )">
                            ${ u.name }<br><small>${ u.email }</small>
                        </button>
                    `
                }
                users.html(html)
            }).catch(err => console.error("Error al cargar usuario: ",err))
    },
    userPosts : function(userId){
        $("#up" + this.userId).removeClass("active")
        $("#up" + userId).addClass("active")
        this.userId = userId
        this.loadPosts()
    },
    loadComment : function(postId){
        let html = ""
        const listaCom = $("#comments" + postId)
        $("#loading" + postId).toggleClass("d-none",false)
        fetch(this.urlComments + "?postId=" + postId)
            .then( resp => resp.json() )
            .then( comments => {
                for( let c of comments ){
                    html += `
                        <li class="list-group-item">
                            De: <b>${ c.email }</b><br>
                            ${ c.body }
                        </li>
                    `
                }
                listaCom.html(html)
                $("#card-com" + postId).toggleClass("d-none",false)
                $("#btn-ver-com" + postId).toggleClass("d-none",true)
                $("#btn-cer-com" + postId).toggleClass("d-none",false)

            }).catch( err => console.error("Hubo un error al leer los comentarios", err))
            .finally( () => {
                $("#loading" + post.Id).toggleClass("d-none",true)
            })
    },
    closeComment : function(postId){
        $("#comments" + postId).html("")
        $('#card-com' + postId).toggleClass("d-none",true)
        $("#loading" + postId).toggleClass("d-none",true)
        $("#btn-ver-com" + postId).toggleClass("d-none",false)
        $("#btn-cer-com" + postId).toggleClass("d-none",true)
    },
    searchByWord : function(){
        $("#up" + this.userId).removeClass("active")
        this.userId = ""
        this.keyWord = $("#buscar").val()
        this.loadPosts()
    }
}

window.onload = function(){
    app.loadPosts()
    app.loadUsers()
}

/* cont.css("width","100%")
cont.addClass("mx-auto mt-5") 
*/
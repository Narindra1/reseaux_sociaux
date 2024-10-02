function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}

function listePublication() {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            console.log(JSON.parse(xhr.response)); //Affichage des résultats 

            let publications = JSON.parse(xhr.response).publications
            publications.forEach(p => {
            const publicationDiv = document.createElement('div');
            publicationDiv.classList.add('info');

            publicationDiv.innerHTML = `
                <p>${p.id}</p>
                <p>${p.nom}</p>
                <p>${p.prenom}</p>
                <p>${p.contenu}</p>
                <p>${p.date_publication}</p>
                <img src="images.jpeg" alt="Description de l'image" />
                <div class="interaction">
                    <button class="reaction-btn">${p.nbr_reactions} Réactions</button>
                    <button class="comment-btn" onclick="getCommentaire(${p.id})">${p.nbr_commentaires} Commentaires</button>
                </div>
                <div id="commentaires${p.id}"></div>

            `;

            document.querySelector("#publications").appendChild(publicationDiv);  // You can append it to a specific container instead of the body if needed
        });

        }
    };
    action = "listePublication"

    xhr.open("GET", "Core/controllerPublication.php?action=" + action, true);
    xhr.send(null);
}

function detailPublication(variable) {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            document.getElementById("resultat").innerHTML = xhr.responseText; //Affichage des résultats 
        }
    };
    action = "listePublication"

    xhr.open("GET", "Core/controllerPublication.php?action=" + action, true);
    xhr.send(null);
}


function getReaction(idPub) {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            document.getElementById("resultat").innerHTML = xhr.responseText; //Affichage des résultats 
        }
    };
    action = "listePublication"

    xhr.open("GET", "Core/controllerPublication.php?action=" + action+"idPub="+idPub, true);
    xhr.send(null);
}

function getCommentaire(idPub) {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            console.log(JSON.parse(xhr.response)); //Affichage des résultats 
            let coms = JSON.parse(xhr.response).coms;
            const newpub = document.createElement('div');
            newpub.innerHTML = `
                <input placeholder="" type='text' class="newComs${idPub} envoyeComs"><img width="30px" height="30px" class="envoyeComs" src="/images/envoyer.png" >
            `;
            
            coms.forEach(p => {
                const publicationDiv = document.createElement('div');
                publicationDiv.innerHTML = `
                <p class="coms_nom">${p.nom}</p>
                <p class="coms_prenom">${p.prenom}</p>
                <p class="coms">${p.label}</p>
            `;
            if(document.querySelector("#commentaires"+idPub).innerHTML!=""){
                document.querySelector("#commentaires"+idPub).innerHTML=""
            }
            else{
                document.querySelector("#commentaires"+idPub).appendChild(publicationDiv);  // You can append it to a specific container instead of the body if needed
                document.querySelector("#commentaires"+idPub).appendChild(newpub);  // You can append it to a specific container instead of the body if needed
            }
        });
    }
};
    action = "getCommentaire"

    xhr.open("GET", "Core/controllerPublication.php?action=" + action+"&idPub="+idPub, true);
    xhr.send(null);
}
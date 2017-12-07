function ready(fn) {
  if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

function makeRequest(method, url) {
  return new Promise(function(resolve, reject) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.onload = function(e) {
      if (xhr.readyState === 4 && xhr.status === 200) {
        resolve(xhr.response);
      } else {
        reject(xhr.statusText);
      }
    };
    xhr.onerror = function(e) {
      reject(xhr.statusText);
    };
    xhr.send(null);
  });
}
function addClass (el, className){
    if (el.classList)
      el.classList.add(className);
    else
      el.className += ' ' + className;
}

function renderList(contacts) {
  console.log(contacts);
  contactlist.innerHTML = '';
  contacts.forEach(function(item, i) {
    // <li class="list-item"><span class="circle-sm"></span>sei</li>
    const node = document.createElement("LI"); // Create a <li> node
    addClass(node, "list-item");
    const photo = document.createElement("SPAN");
    addClass(photo, "circle-sm");
    node.appendChild(photo);
    const textnode = document.createTextNode(item.firstname + ' ' + item.lastname); // Create a text node
    node.appendChild(textnode);
    contactlist.appendChild(node);   
  });
}
function renderDetails(contact){
    detailstable.innerHTML='';

}

function getContacts() {
  renderList([]);
  makeRequest('GET', './index.php/contacts/allcontacts')
    .then(function(datums) {
      renderList(JSON.parse(datums));
      //renderDetails();
    })
    .catch(function(err) {
      console.error('Augh, there was an error!', err.statusText);
    });
}

ready(getContacts);
// var listData;
var stackData;
var listData;
var techRowCounter = 1;
var techTable = '';

let options = "<option value='x'>Exp</option>";
for (i = 0; i <= 21; i++) {
  options += "<option value='" + i + "'>" + i + '</option>';
}

//get the root
const app = document.getElementById('root');

//create container
const container = document.createElement('div');
container.setAttribute('class', 'container');
app.appendChild(container);

//create main card
const searchCard = document.createElement('div');
searchCard.setAttribute('class', 'card');

//create main card header
const searchHeader = document.createElement('h1');
searchHeader.textContent = 'Search for...';

//create my list
const myList = document.createElement('div');
myList.setAttribute('class', 'mylist-div');
var myListTable =
  '<center><select name="lists" id="lists" class="mylist-list">';
var mylistOptions;
var requestList = new XMLHttpRequest();
let listURL = baseUrl + 'queries/getLists.php';
requestList.open('GET', listURL, true);
requestList.send();
requestList.onload = function () {
  listData = JSON.parse(requestList.response);
  if (requestList.status >= 200 && requestList.status < 400) {
    listData.forEach((list) => {
      myListTable += '<option value="1">' + list.list_name + '</option>';
    });
  }
  myListTable += '</select></center>';
  myList.innerHTML = myListTable;
};

//create searchlist
const searchList = document.createElement('div');
searchList.setAttribute('class', 'search-list');
techTable = '<center><table>';
var requestStack = new XMLHttpRequest();
let stackURL = baseUrl + 'queries/getStack.php';
requestStack.open('GET', stackURL, true);
requestStack.send();
requestStack.onload = function () {
  stackData = JSON.parse(requestStack.response);
  stackCode = requestStack.status;
  if (requestStack.status >= 200 && requestStack.status < 400) {
    stackData.forEach((stack) => {
      techTable += '<tr>';
      techTable += '<td width="60%">' + escapeHtml(stack.tech_name) + '</td>';
      techTable +=
        '<td><input type="checkbox" data-name="' +
        escapeHtml(stack.tech_name) +
        '" data-id="' +
        stack.id +
        '" id="tech_' +
        techRowCounter +
        '" onclick="setState(this.id)"}></td>';
      techTable +=
        '<td><select id="tech_' +
        techRowCounter +
        '-exp" disabled>' +
        options +
        '</select> yrs</td>';
      techTable += '</tr>';
      techRowCounter++;
    });
  }
  techTable += '<tr>';
  techTable +=
    '<td colspan="3" align="center"><button class="button-9" role="button" onClick="getTalent()">Search</button></td>';
  techTable += '</tr>';
  techTable += '<tr>';
  techTable +=
    '<td colspan="3" align="center"><button class="button-9" role="button" onClick="resetCards()">Reset</button></td>';
  techTable += '</tr>';
  techTable += '<tr>';
  techTable += '<td colspan="3" align="center"></td>';
  techTable += '</tr>';
  techTable += '</table><br /></center>';
  searchList.innerHTML = techTable;
};

//Add to the main card to page.
container.appendChild(searchCard);
//add the header to the card
searchCard.appendChild(searchHeader);
//add the mylist to the card
searchCard.appendChild(myList);
searchCard.appendChild(searchList);

function escapeHtml(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;',
  };

  return text.toString().replace(/[&<>"']/g, function (m) {
    return map[m];
  });
}

function resetCards() {
  for (let index = 1; index <= techRowCounter - 1; index++) {
    document.getElementById('tech_' + index).checked = false;
    document.getElementById('tech_' + index + '-exp').selectedIndex = 0;
    document.getElementById('tech_' + index + '-exp').disabled = true;
  }

  while (container.childNodes.length > 1) {
    container.removeChild(container.lastChild);
  }
}

function getTalent() {
  while (container.childNodes.length > 1) {
    container.removeChild(container.lastChild);
  }
  let noTech = true;
  let noExp = false;
  let errorMsg = '';
  let queryString = '{';
  for (i = 1; i <= techRowCounter - 1; i++) {
    var element = document.getElementById('tech_' + i);
    var dataType = element.getAttribute('data-id');
    var dataName = element.getAttribute('data-name');
    var techExp = document.getElementById('tech_' + i + '-exp').value;
    if (element.checked == true) {
      if (techExp != 'x') {
        noTech = false;
        queryString += '"' + escapeHtml(dataType) + '":"' + techExp + '",';
      } else {
        noExp = true;
        errorMsg +=
          "<i class='fa fa-exclamation-triangle' style='color:red'/></i>&nbsp;&nbsp;&nbsp;No Exp value for " +
          escapeHtml(dataName) +
          '<br />';
      }
    }
  }
  queryString = queryString.slice(0, -1);
  queryString += '}';
  if (!noExp && !noTech) {
    let url = baseUrl + 'queries/getTech.php';
    request.open('POST', url, true);
    request.send(queryString);
  } else {
    const card = document.createElement('div');
    card.setAttribute('class', 'card');

    const errorHeader = document.createElement('h1');
    errorHeader.textContent = 'ERROR';

    const errorMessage = document.createElement('p');

    if (noTech) {
      errorMessage.innerHTML =
        "<i class='fa fa-exclamation-triangle' style='color:red'/></i>&nbsp;&nbsp;&nbsp;No Selection Made";
    }

    if (noExp) {
      errorMessage.innerHTML = errorMsg;
    }

    container.appendChild(card);
    card.appendChild(errorHeader);
    card.appendChild(errorMessage);
  }
}

var request = new XMLHttpRequest();

request.onload = function () {
  var data = JSON.parse(this.response);

  if (request.status >= 200 && request.status < 400) {
    data.forEach((talent) => {
      const card = document.createElement('div');
      card.setAttribute('class', 'card');

      const talentName = document.createElement('h1');
      talentName.textContent = escapeHtml(talent.name);

      const techPoints = document.createElement('h2');
      techPoints.className = 'tech-points';
      techPoints.textContent = 'Tech Points: ' + talent.tech_points;

      const expPoints = document.createElement('h2');
      expPoints.className = 'exp-points';
      expPoints.textContent = 'Experience Points: ' + talent.exp_points;

      const email = document.createElement('h3');
      email.className = 'email-header';
      email.innerHTML =
        "<a href='mailto:" +
        escapeHtml(talent.email) +
        "'><button class='button-9' role='button'>Contact " +
        escapeHtml(talent.name) +
        '</button></a>';

      const addtolist = document.createElement('h3');
      addtolist.className = 'email-header';
      addtolist.innerHTML =
        "<a href='mailto:" +
        escapeHtml(talent.email) +
        "'><button class='button-9' role='button'>Add to current list</button></a>";

      const salary = document.createElement('h3');
      salary.className = 'salary_header';
      salary.textContent = 'Salary Expectations: ' + escapeHtml(talent.salary);

      const jobsHeader = document.createElement('h3');
      jobsHeader.className = 'jobs_header';
      jobsHeader.textContent = 'Positions Held';

      const jobsHeld = document.createElement('p');
      jobsHeld.setAttribute('style', 'white-space: pre;');

      for (i = 0; i < talent.roles.length; i++) {
        jobsHeld.textContent += escapeHtml(talent.roles[i].title);
        jobsHeld.textContent += ' (';
        jobsHeld.textContent += escapeHtml(talent.roles[i].exp);
        jobsHeld.textContent += ' yrs)';
        jobsHeld.textContent += '\r\n';
      }

      const techHeader = document.createElement('h3');
      techHeader.className = 'tech_header';
      techHeader.textContent = 'Stack';

      const requiredTech = document.createElement('p');
      requiredTech.className = 'tech_content';
      requiredTech.textContent += 'Required:\r\n';

      for (i = 0; i < talent.stack.required.length; i++) {
        requiredTech.textContent += talent.stack.required[i].title;
        requiredTech.textContent += ' (';
        requiredTech.textContent += talent.stack.required[i].exp;
        requiredTech.textContent += ' yrs)';
        requiredTech.textContent += '\r\n';
      }

      const additionalTech = document.createElement('p');
      additionalTech.setAttribute('style', 'white-space: pre;');
      additionalTech.textContent += 'Additional:\r\n';

      if ('additional' in talent.stack === true) {
        for (i = 0; i < talent.stack.additional.length; i++) {
          additionalTech.textContent += escapeHtml(
            talent.stack.additional[i].title
          );
          additionalTech.textContent += ' (';
          additionalTech.textContent += escapeHtml(
            talent.stack.additional[i].exp
          );
          additionalTech.textContent += ' yrs)';
          additionalTech.textContent += '\r\n';
        }
      }

      container.appendChild(card);
      card.appendChild(talentName);
      card.appendChild(email);
      card.appendChild(addtolist);
      card.appendChild(techPoints);
      card.appendChild(expPoints);
      card.appendChild(salary);
      card.appendChild(techHeader);
      card.appendChild(requiredTech);
      card.appendChild(additionalTech);
      card.appendChild(jobsHeader);
      card.appendChild(jobsHeld);
    });
  } else {
    const card = document.createElement('div');
    card.setAttribute('class', 'card');

    const errorHeader = document.createElement('h1');
    errorHeader.textContent = 'ERROR';

    const errorMessage = document.createElement('h1');
    errorMessage.textContent = 'No Records Found';

    container.appendChild(card);
    card.appendChild(errorHeader);
    card.appendChild(errorMessage);
  }
};

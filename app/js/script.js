const app = document.getElementById('root');

const container = document.createElement('div');
container.setAttribute('class', 'container');
app.appendChild(container);

let options = "<option value='x'>Exp</option>";
for (i = 0; i <= 21; i++) {
  options += "<option value='" + i + "'>" + i + '</option>';
}

var techRowCounter = 1;
var requestStack = new XMLHttpRequest();
let url = baseUrl + 'queries/getStack.php';

requestStack.open('GET', url, true);
requestStack.send();
requestStack.onload = function () {
  var stackData = JSON.parse(requestStack.response);
  var techTable = '';

  const searchCard = document.createElement('div');
  searchCard.setAttribute('class', 'card');

  const searchHeader = document.createElement('h1');
  searchHeader.textContent = 'Search for...';

  const searchList = document.createElement('div');
  searchList.setAttribute('class', 'search-list');

  techTable = '<center><table>';

  if (requestStack.status >= 200 && requestStack.status < 400) {
    stackData.forEach((stack) => {
      techTable +=
        "<tr><td width='60%'>" +
        escapeHtml(stack.tech_name) +
        "</td><td><input type='checkbox' data-name='" +
        escapeHtml(stack.tech_name) +
        "' data-id='" +
        stack.id +
        "' id='tech_" +
        techRowCounter +
        "' onclick='setState(this.id)'></td><td><select id='tech_" +
        techRowCounter +
        "-exp' disabled>" +
        options +
        '</select> yrs</td></tr>';
      techRowCounter++;
    });
  }
  techTable +=
    "<tr><td colspan='3' align='center'><button class='button-9' role='button' onClick='getTalent()'>Search</button></td></tr>";
  techTable +=
    "<tr><td colspan='3' align='center'><button class='button-9' role='button' onClick='resetCards()'>Reset</button></td></tr>";
  techTable += '</table><br /></center>';
  searchList.innerHTML = techTable;
  container.appendChild(searchCard);
  searchCard.appendChild(searchHeader);
  searchCard.appendChild(searchList);
  techRowCounter = stackData.length;
};

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

function resetCards() {
  for (let index = 1; index <= techRowCounter; index++) {
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

  for (i = 1; i <= techRowCounter; i++) {
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

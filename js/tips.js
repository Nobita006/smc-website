async function fetchTips(query = '') {
    const response = await fetch(`php/tips.php?action=view&query=${query}`);
    const tips = await response.json();
    const searchResults = document.getElementById('searchResults');
    searchResults.innerHTML = '';

    const highlightQuery = (text, query) => {
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<span class="highlight">$1</span>');
    };

    tips.forEach(tip => {
        const tipDiv = document.createElement('div');
        const tipText = document.createElement('p');

        // Highlight the matched part
        if (query) {
            tipText.innerHTML = highlightQuery(tip.tip, query);
        } else {
            tipText.textContent = tip.tip;
        }

        const editInput = document.createElement('input');
        editInput.type = 'text';
        editInput.value = tip.tip;
        editInput.style.display = 'none';

        const editButton = document.createElement('button');
        editButton.textContent = 'Edit';
        editButton.onclick = () => {
            editInput.style.display = 'inline';
            tipText.style.display = 'none';
            saveButton.style.display = 'inline';
        };

        const saveButton = document.createElement('button');
        saveButton.textContent = 'Save';
        saveButton.style.display = 'none';
        saveButton.onclick = async () => {
            await updateTip(tip.id, editInput.value);
            fetchTips(query);
        };

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = async () => {
            await deleteTip(tip.id);
            fetchTips(query);
        };

        tipDiv.appendChild(tipText);
        tipDiv.appendChild(editInput);
        tipDiv.appendChild(editButton);
        tipDiv.appendChild(saveButton);
        tipDiv.appendChild(deleteButton);

        searchResults.appendChild(tipDiv);
    });

    searchResults.style.display = tips.length ? 'block' : 'none';
}

async function addTip() {
    const newTip = document.getElementById('newTip').value;
    const response = await fetch('php/tips.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=add&tip=${encodeURIComponent(newTip)}`
    });
    const result = await response.json();
    alert(result.message);
    document.getElementById('newTip').value = '';
    fetchTips();
}

async function deleteTip(id) {
    const response = await fetch('php/tips.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=delete&id=${id}`
    });
    const result = await response.json();
    alert(result.message);
}

async function updateTip(id, tip) {
    const response = await fetch('php/tips.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=edit&id=${id}&tip=${encodeURIComponent(tip)}`
    });
    const result = await response.json();
    alert(result.message);
}

document.getElementById('searchBar').addEventListener('keyup', () => {
    const query = document.getElementById('searchBar').value;
    fetchTips(query);
});

document.getElementById('addTipForm').addEventListener('submit', function(event) {
    event.preventDefault();
    addTip();
});

fetchTips();  // Initial load of tips

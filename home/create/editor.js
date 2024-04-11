const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'], // toggled buttons
  ['blockquote', 'code-block'],
  ['link', 'image', 'video', 'formula'],

  [{ header: 1 }, { header: 2 }], // custom button values
  [{ list: 'ordered' }, { list: 'bullet' }, { list: 'check' }],
  [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
  [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
  [{ direction: 'rtl' }], // text direction

  [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
  [{ header: [1, 2, 3, 4, 5, 6, false] }],

  [{ color: [] }, { background: [] }], // dropdown with defaults from theme
  [{ font: [] }],
  [{ align: [] }],

  ['clean'] // remove formatting button
];

// const Font = Quill.import('formats/font');
// Font.whitelist = ['sans-serif'];
// Quill.register(Font, true);

const quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

const quill2 = new Quill('#body-ql', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

document
  .getElementById('editor-form')
  .addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    // Get the HTML content from the Quill editor
  

    var content1 = document.querySelector('#body-ql .ql-editor').innerHTML;

    // Get the HTML content from the second Quill editor
    var content2 = document.querySelector('#editor .ql-editor').innerHTML;


    // Get additional form data
    var RecipeName = document.getElementById('RecipeName').value;
    var chefname = document.getElementById('chefname').value;
    var category = document.getElementById('category').value;
    var image = document.getElementById('image').value;
    var rate = document.getElementById('rate').value;

    // Create FormData object to send data to PHP script
    var formData = new FormData();
    formData.append('RecipeName', RecipeName);
    formData.append('image', image);
    formData.append('chefname', chefname);
    formData.append('rate', rate);
    formData.append('category', category);
    formData.append('Ingredients', content1); // Add content from first editor
    formData.append('Directions', content2);
    

    // Send data to PHP script using fetch API
    fetch('./create.php', {
      method: 'POST',
      body: formData
    })
      .then((response) => response.text())
      .then((data) => {
        window.location.replace('/pages/created?' + data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });

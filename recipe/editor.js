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
// var ColorClass = Quill.import('attributors/class/color');
// var SizeStyle = Quill.import('attributors/style/size');
// Quill.register(ColorClass, true);
// Quill.register(SizeStyle, true);
// Font.whitelist = ['sans-serif'];
// Quill.register(Font, true);

const quill = new Quill('#editor', {
  readOnly: true,
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

const quill2 = new Quill('#editor2', {
  readOnly: true,
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

console.log(quill2);
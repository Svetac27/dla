(() => {
  'use strict';
  var e,
    t = {
      926: () => {
        const e = window.wp.blocks,
          t = window.React,
          l = window.wp.i18n,
          n = window.wp.blockEditor,
          r = window.wp.components,
          i = JSON.parse('{"UU":"create-block/tile-rich-text"}');
        (0, e.registerBlockType)(i.UU, {
          edit: function ({ attributes, setAttributes }) {
            const { image, title, bulletColor, richText, media } = attributes;

            // Image state
            const [mediaId, setMediaId] = t.useState(media && media.id ? media.id : 0);
            const [mediaUrl, setMediaUrl] = t.useState(media && media.url ? media.url : '');

            // Rich text state
            // We'll use a textarea to allow custom HTML input (not just RichText formatting).
            const [richTextContent, setRichTextContent] = t.useState(richText || '');

            return (0, t.createElement)(
              t.Fragment,
              null,
              (0, t.createElement)(
                n.InspectorControls,
                null,
                (0, t.createElement)(
                  r.PanelBody,
                  { title: (0, l.__)('Tile M4: Tile with Image, Title and Rich Text', 'tile-rich-text') },
                  (0, t.createElement)(
                    n.MediaUploadCheck,
                    null,
                    (0, t.createElement)(n.MediaUpload, {
                      onSelect: (mediaObj) => {
                        setAttributes({ media: mediaObj, image: mediaObj.url || '' });
                        setMediaId(mediaObj.id || 0);
                        setMediaUrl(mediaObj.url || '');
                      },
                      value: mediaId,
                      allowedTypes: ['image'],
                      render: ({ open }) =>
                        (0, t.createElement)(
                          r.Button,
                          {
                            className:
                              mediaId === 0
                                ? 'editor-post-featured-image__toggle'
                                : 'editor-post-featured-image__preview',
                            onClick: open,
                            style: { marginBottom: '1rem' },
                            variant: media && Object.keys(media).length ? '' : 'secondary'
                          },
                          media && Object.keys(media).length
                            ? media.url
                              ? (0, t.createElement)('img', { src: media.url, style: { maxWidth: '4.5rem' } })
                              : media.title
                            : (0, l.__)('Choose an image', 'awp')
                        )
                    }),
                    media && Object.keys(media).length
                      ? (0, t.createElement)(
                          r.Button,
                          {
                            onClick: () => {
                              setMediaId(0);
                              setMediaUrl('');
                              setAttributes({ media: {}, image: '' });
                            },
                            style: { display: 'block', width: '100%', textAlign: 'right', margin: '0.5rem 0' },
                            variant: 'link'
                          },
                          (0, l.__)('Remove image', 'awp')
                        )
                      : '',
                    (0, t.createElement)(r.TextControl, {
                      label: (0, l.__)('Title', 'title'),
                      value: title,
                      onChange: (e) => setAttributes({ title: e })
                    })
                  ),
                  (0, t.createElement)('hr', { style: { border: '2px solid gray' } }),
                  // Custom HTML textarea for Rich Text
                  (0, t.createElement)(
                    'p',
                    { style: { textTransform: 'uppercase', marginBottom: '1rem' } },
                    (0, l.__)('Custom HTML Content', 'custom-html')
                  ),
                  (0, t.createElement)(r.TextareaControl, {
                    label: (0, l.__)('Paste custom HTML for Rich Text', 'tile-rich-text'),
                    value: richTextContent,
                    onChange: (val) => {
                      setRichTextContent(val);
                      setAttributes({ richText: val });
                    },
                    help: 'Paste HTML here (e.g. <h3>Heading</h3><ul><li>Item</li></ul><strong>Bold</strong>). Use valid HTML tags.'
                  }),
                  (0, t.createElement)('hr', { style: { border: '2px solid gray' } }),
                  // Bullet color picker
                  (0, t.createElement)(r.TextControl, {
                    value: bulletColor || '',
                    onChange: (val) => setAttributes({ bulletColor: val }),
                    placeholder: '#333333'
                  }),
                  (0, t.createElement)(
                    'label',
                    {
                      style: {
                        fontSize: '11px',
                        fontWeight: 500,
                        lineHeight: 1.4,
                        textTransform: 'uppercase',
                        display: 'block',
                        marginBottom: '6px',
                        marginTop: '1rem'
                      }
                    },
                    (0, l.__)('Bullet Color', 'bullet-color')
                  ),
                  (0, t.createElement)(r.ColorPalette, {
                    value: bulletColor || '',
                    onChange: (color) => setAttributes({ bulletColor: color }),
                    allowCustom: true,
                    clearable: true,
                    colors: [
                      { name: 'Yellow', color: '#fcbe04' },
                      { name: 'Green', color: '#d9dc42' },
                      { name: 'Red', color: '#e62a4f' },
                      { name: 'Blue', color: '#144774' },
                      { name: 'Gray', color: '#333333' }
                    ]
                  })
                )
              ),
              (0, t.createElement)(
                'div',
                { ...(0, n.useBlockProps)() },
                (0, t.createElement)(
                  'div',
                  { style: { padding: '1rem', width: '100%' } },
                  (0, t.createElement)(
                    'div',
                    {
                      style: {
                        width: '100%',
                        display: 'flex',
                        justifyContent: 'flex-start',
                        alignItems: 'center'
                      }
                    },
                    media && media.url
                      ? (0, t.createElement)('img', {
                          style: { maxWidth: '2rem', marginRight: '1rem' },
                          src: media.url
                        })
                      : '',
                    (0, t.createElement)('strong', { style: { fontSize: '16px' } }, title)
                  ),
                  (0, t.createElement)(
                    'div',
                    { style: { marginTop: '1rem', width: '100%' } },
                    bulletColor &&
                      (0, t.createElement)(
                        'style',
                        null,
                        `.tile-m4-rich-text ul li::marker { color: ${bulletColor}; }`
                      ),
                    richTextContent
                      ? (0, t.createElement)('div', {
                          dangerouslySetInnerHTML: { __html: richTextContent },
                          className: 'tile-m4-rich-text',
                          style: { width: '100%' }
                        })
                      : (0, t.createElement)(
                          'p',
                          { style: { fontStyle: 'italic', color: '#888' } },
                          (0, l.__)('No rich text content added yet.', 'tile-rich-text')
                        )
                  )
                )
              )
            );
          }
        });
      }
    },
    l = {};
  function n(e) {
    var r = l[e];
    if (void 0 !== r) return r.exports;
    var i = (l[e] = { exports: {} });
    return (t[e](i, i.exports, n), i.exports);
  }
  ((n.m = t),
    (e = []),
    (n.O = (t, l, r, i) => {
      if (!l) {
        var a = 1 / 0;
        for (h = 0; h < e.length; h++) {
          for (var [l, r, i] = e[h], o = !0, c = 0; c < l.length; c++)
            (!1 & i || a >= i) && Object.keys(n.O).every((e) => n.O[e](l[c]))
              ? l.splice(c--, 1)
              : ((o = !1), i < a && (a = i));
          if (o) {
            e.splice(h--, 1);
            var s = r();
            void 0 !== s && (t = s);
          }
        }
        return t;
      }
      i = i || 0;
      for (var h = e.length; h > 0 && e[h - 1][2] > i; h--) e[h] = e[h - 1];
      e[h] = [l, r, i];
    }),
    (n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (() => {
      var e = { 57: 0, 350: 0 };
      n.O.j = (t) => 0 === e[t];
      var t = (t, l) => {
          var r,
            i,
            [a, o, c] = l,
            s = 0;
          if (a.some((t) => 0 !== e[t])) {
            for (r in o) n.o(o, r) && (n.m[r] = o[r]);
            if (c) var h = c(n);
          }
          for (t && t(l); s < a.length; s++) ((i = a[s]), n.o(e, i) && e[i] && e[i][0](), (e[i] = 0));
          return n.O(h);
        },
        l = (globalThis.webpackChunkjeck_test_block = globalThis.webpackChunkjeck_test_block || []);
      (l.forEach(t.bind(null, 0)), (l.push = t.bind(null, l.push.bind(l))));
    })());
  var r = n.O(void 0, [350], () => n(926));
  r = n.O(r);
})();

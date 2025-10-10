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
          i = JSON.parse('{"UU":"create-block/tile-list"}');
        (0, e.registerBlockType)(i.UU, {
          edit: function ({ attributes, setAttributes }) {
            const { image, title, bulletColor, list = [], media } = attributes;

            // Image state
            const [mediaId, setMediaId] = t.useState(media && media.id ? media.id : 0);
            const [mediaUrl, setMediaUrl] = t.useState(media && media.url ? media.url : '');

            // List state
            const [items, setItems] = t.useState(list && Array.isArray(list) ? list : []);

            // Add new item
            function addItem() {
              const newItems = [...items, ''];
              setItems(newItems);
              setAttributes({ list: newItems });
            }

            // Update item text
            function updateItem(idx, value) {
              const newItems = [...items];
              newItems[idx] = value;
              setItems(newItems);
              setAttributes({ list: newItems });
            }

            // Remove item
            function removeItem(idx) {
              const newItems = items.filter((_, i) => i !== idx);
              setItems(newItems);
              setAttributes({ list: newItems });
            }

            // Sync local state if attributes.list changes externally
            t.useEffect(() => {
              if (JSON.stringify(list) !== JSON.stringify(items)) {
                setItems(list);
              }
            }, [list]);

            return (0, t.createElement)(
              t.Fragment,
              null,
              (0, t.createElement)(
                n.InspectorControls,
                null,
                (0, t.createElement)(
                  r.PanelBody,
                  { title: (0, l.__)('Tile M3: Tile with Image, Title and List', 'tile-list') },
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
                  // List editor
                  (0, t.createElement)(
                    'p',
                    { style: { textTransform: 'uppercase', marginBottom: '1rem' } },
                    (0, l.__)('Item list', 'item-list')
                  ),
                  (0, t.createElement)(
                    'div',
                    null,
                    items.map((item, idx) =>
                      (0, t.createElement)(
                        'div',
                        {
                          key: idx,
                          style: {
                            display: 'flex',
                            flexDirection: 'column',
                            alignItems: 'start'
                          }
                        },
                        (0, t.createElement)(r.TextControl, {
                          label: (0, l.__)(`Item (${idx + 1})`),
                          value: item,
                          onChange: (value) => updateItem(idx, value),
                          className: 'tile-list-item-input'
                        }),
                        (0, t.createElement)(
                          r.Button,
                          {
                            onClick: () => removeItem(idx),
                            style: { display: 'block', width: '100%', textAlign: 'right' },
                            variant: 'link'
                          },
                          'Remove item'
                        )
                      )
                    ),
                    (0, t.createElement)(
                      r.Button,
                      {
                        style: {
                          marginTop: '1rem',
                          width: '100%',
                          display: 'flex',
                          justifyContent: 'center',
                          alignItems: 'center'
                        },
                        variant: 'secondary',
                        onClick: addItem
                      },
                      'Add List Item'
                    )
                  ),
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
                  { style: { padding: '1rem', display: 'flex', flexDirection: 'column', alignItems: 'center' } },
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
                          style: { maxWidth: '4.5rem' },
                          src: media.url
                        })
                      : '',
                    (0, t.createElement)('strong', { style: { fontSize: '16px' } }, title)
                  ),
                  items.length > 0
                    ? (0, t.createElement)(
                        'div',
                        { style: { width: '100%', marginTop: '1rem' } },
                        items.map((item, idx) =>
                          (0, t.createElement)(
                            'div',
                            {
                              key: idx,
                              className: 'tile-list-item',
                              style: { display: 'flex', alignItems: 'center', marginBottom: '0.25rem' }
                            },
                            (0, t.createElement)('span', {
                              style: {
                                display: 'inline-block',
                                width: '0.7em',
                                height: '0.7em',
                                borderRadius: '50%',
                                backgroundColor: bulletColor || '#fff',
                                marginRight: '0.7em'
                              }
                            }),
                            (0, t.createElement)('span', { style: { color: '#fff' } }, item)
                          )
                        )
                      )
                    : null
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

(() => {
  'use strict';
  var e,
    t = {
      214: () => {
        const e = window.wp.blocks,
          t = window.React,
          l = window.wp.i18n,
          a = window.wp.blockEditor,
          n = window.wp.components,
          r = JSON.parse('{"UU":"create-block/tile-info"}');
        (0, e.registerBlockType)(r.UU, {
          edit: function ({ attributes: e, setAttributes: r }) {
            const { image: s, is_small: p, title: i, description: m, media: c } = e,
              [d, u] = (0, t.useState)(o ? o.length : 0),
              [g, y] = (0, t.useState)(o || []),
              [v, h] = (0, t.useState)(0),
              [E, b] = (0, t.useState)(0),
              w = (e = 'li') => {
                const t = [...g];
                (t.push({ type: e, value: '' }), y(t), r({ items: t }), u(d + 1));
              },
              f = (e, t) => {
                const l = [...g];
                ((l[e] = t), y(l), r({ items: l }));
              };
            return (0, t.createElement)(
              t.Fragment,
              null,
              (0, t.createElement)(
                a.InspectorControls,
                null,
                (0, t.createElement)(
                  n.PanelBody,
                  { title: (0, l.__)('Tile M1: Tile with Icon, title and description') },
                  (0, t.createElement)(
                    a.MediaUploadCheck,
                    null,
                    (0, t.createElement)(a.MediaUpload, {
                      onSelect: (e) => {
                        (r({ media: e, image: e.url || '' }), h(c.id || 0), b(c.url || ''));
                      },
                      value: v,
                      allowedTypes: ['image'],
                      render: ({ open: e }) =>
                        (0, t.createElement)(
                          n.Button,
                          {
                            className:
                              0 == v ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview',
                            onClick: e,
                            variant: null != c && Object.keys(c).length ? '' : 'secondary'
                          },
                          null != c && Object.keys(c).length
                            ? c.url
                              ? (0, t.createElement)('img', { src: c.url })
                              : c.title
                            : (0, l.__)('Choose an image', 'awp')
                        )
                    }),
                    null != c && Object.keys(c).length
                      ? (0, t.createElement)(
                          n.Button,
                          {
                            onClick: () => {
                              (h(0), b(''), r({ media: {}, image: '' }));
                            },
                            variant: 'link'
                          },
                          (0, l.__)('Remove image', 'awp')
                        )
                      : ''
                  ),
                  (0, t.createElement)(n.CheckboxControl, {
                    style: { marginTop: '0.5rem' },
                    label: (0, t.createElement)(
                      'span',
                      {
                        style: { fontSize: '11px', textTransform: 'uppercase', display: 'block', marginTop: '0.5rem' }
                      },
                      (0, l.__)('Smaller image', 'smaller-image')
                    ),
                    checked: p,
                    onChange: (e) => r({ is_small: e })
                  }),
                  (0, t.createElement)(n.TextControl, {
                    label: (0, l.__)('Title', 'title'),
                    value: i,
                    onChange: (e) => r({ title: e })
                  }),
                  (0, t.createElement)(n.TextareaControl, {
                    label: (0, l.__)('Description', 'description'),
                    value: m,
                    onChange: (e) => r({ description: e })
                  })
                )
              ),
              (0, t.createElement)(
                'div',
                { ...(0, a.useBlockProps)() },
                (0, t.createElement)(
                  'div',
                  { style: { padding: '1rem', display: 'flex', flexDirection: 'column', alignItems: 'center' } },
                  c && c.url ? (0, t.createElement)('img', { style: { maxWidth: '4.5rem' }, src: c.url }) : '',
                  (0, t.createElement)('strong', { style: { fontSize: '16px' } }, i),
                  (0, t.createElement)('p', { style: { fontSize: '12px', textAlign: 'center' } }, m)
                )
              )
            );
          }
        });
      }
    },
    l = {};
  function a(e) {
    var n = l[e];
    if (void 0 !== n) return n.exports;
    var r = (l[e] = { exports: {} });
    return (t[e](r, r.exports, a), r.exports);
  }
  ((a.m = t),
    (e = []),
    (a.O = (t, l, n, r) => {
      if (!l) {
        var i = 1 / 0;
        for (m = 0; m < e.length; m++) {
          for (var [l, n, r] = e[m], o = !0, s = 0; s < l.length; s++)
            (!1 & r || i >= r) && Object.keys(a.O).every((e) => a.O[e](l[s]))
              ? l.splice(s--, 1)
              : ((o = !1), r < i && (i = r));
          if (o) {
            e.splice(m--, 1);
            var c = n();
            void 0 !== c && (t = c);
          }
        }
        return t;
      }
      r = r || 0;
      for (var m = e.length; m > 0 && e[m - 1][2] > r; m--) e[m] = e[m - 1];
      e[m] = [l, n, r];
    }),
    (a.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (() => {
      var e = { 57: 0, 350: 0 };
      a.O.j = (t) => 0 === e[t];
      var t = (t, l) => {
          var n,
            r,
            [i, o, s] = l,
            c = 0;
          if (i.some((t) => 0 !== e[t])) {
            for (n in o) a.o(o, n) && (a.m[n] = o[n]);
            if (s) var m = s(a);
          }
          for (t && t(l); c < i.length; c++) ((r = i[c]), a.o(e, r) && e[r] && e[r][0](), (e[r] = 0));
          return a.O(m);
        },
        l = (globalThis.webpackChunkjeck_test_block = globalThis.webpackChunkjeck_test_block || []);
      (l.forEach(t.bind(null, 0)), (l.push = t.bind(null, l.push.bind(l))));
    })());
  var n = a.O(void 0, [350], () => a(214));
  n = a.O(n);
})();

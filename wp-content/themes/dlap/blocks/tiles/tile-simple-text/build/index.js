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
          r = JSON.parse('{"UU":"create-block/tile-simple-text"}');
        (0, e.registerBlockType)(r.UU, {
          attributes: {
            title: { type: 'string', default: '' },
            text: { type: 'string', default: '' }
          },
          edit: function ({ attributes: e, setAttributes: r }) {
            const { title: i, text: m } = e;
            return (0, t.createElement)(
              t.Fragment,
              null,
              (0, t.createElement)(
                a.InspectorControls,
                null,
                (0, t.createElement)(
                  n.PanelBody,
                  { title: (0, l.__)('Tile M5: Tile with Text') },
                  (0, t.createElement)(n.TextControl, {
                    label: (0, l.__)('Title', 'title'),
                    value: i,
                    onChange: (val) => r({ title: val })
                  }),
                  (0, t.createElement)(a.RichText, {
                    tagName: 'div',
                    value: m,
                    allowedFormats: ['core/bold', 'core/italic', 'core/link'],
                    multiline: 'p',
                    placeholder: (0, l.__)('Type or paste your text…'),
                    style: {
                      fontSize: '12px',
                      marginTop: '1rem',
                      minHeight: '80px',
                      border: '1px solid #eee',
                      padding: '6px',
                      borderRadius: '4px',
                      textAlign: 'left',
                      width: '100%'
                    },
                    onChange: (val) => r({ text: val })
                  })
                )
              ),
              (0, t.createElement)(
                'div',
                { ...(0, a.useBlockProps()) },
                (0, t.createElement)(
                  'div',
                  { style: { padding: '1rem', display: 'flex', flexDirection: 'column', alignItems: 'center' } },
                  (0, t.createElement)('strong', { style: { fontSize: '16px' } }, i),
                  (0, t.createElement)(a.RichText, {
                    tagName: 'div',
                    className: 'tile-simple-text-content',
                    value: m,
                    allowedFormats: ['core/bold', 'core/italic', 'core/link'],
                    multiline: 'p',
                    style: { fontSize: '12px', width: '100%' },
                    onChange: (val) => r({ text: val })
                  })
                )
              )
            );
          },
          save: function ({ attributes: e }) {
            const { title: i, text: m } = e;
            return (0, t.createElement)(
              'div',
              { ...(0, a.useBlockProps.save()) },
              (0, t.createElement)(
                'div',
                { style: { padding: '1rem', display: 'flex', flexDirection: 'column', alignItems: 'center' } },
                (0, t.createElement)('strong', { style: { fontSize: '16px' } }, i),
                (0, t.createElement)(a.RichText.Content, {
                  tagName: 'div',
                  className: 'tile-simple-text-content',
                  value: m,
                  style: { fontSize: '12px', textAlign: 'center', width: '100%' }
                })
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

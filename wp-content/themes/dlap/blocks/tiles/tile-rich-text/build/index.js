(() => {
  'use strict';
  const { registerBlockType } = window.wp.blocks;
  const React = window.React;
  const { __ } = window.wp.i18n;
  const { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps, ColorPalette, RichText } =
    window.wp.blockEditor;
  const { PanelBody, Button, TextControl } = window.wp.components;

  const bulletColors = [
    { name: 'Yellow', color: '#fcbe04' },
    { name: 'Green', color: '#d9dc42' },
    { name: 'Red', color: '#e62a4f' },
    { name: 'Blue', color: '#144774' },
    { name: 'Gray', color: '#333333' }
  ];

  registerBlockType('create-block/tile-rich-text', {
    attributes: {
      image: { type: 'string', default: '' },
      media: { type: 'object', default: {} },
      title: { type: 'string', default: '' },
      bulletColor: { type: 'string', default: '' },
      description: { type: 'string', default: '' }
    },
    edit: function ({ attributes, setAttributes }) {
      const { image, media, title, description, bulletColor } = attributes;
      const [mediaId, setMediaId] = React.useState(media && media.id ? media.id : 0);
      const [mediaUrl, setMediaUrl] = React.useState(media && media.url ? media.url : '');

      return React.createElement(
        React.Fragment,
        null,
        React.createElement(
          InspectorControls,
          null,
          React.createElement(
            PanelBody,
            { title: __('Tile M4: Tile with Image, Title and Description', 'tile-rich-text') },
            React.createElement(
              MediaUploadCheck,
              null,
              React.createElement(MediaUpload, {
                onSelect: (mediaObj) => {
                  setAttributes({ media: mediaObj, image: mediaObj.url || '' });
                  setMediaId(mediaObj.id || 0);
                  setMediaUrl(mediaObj.url || '');
                },
                value: mediaId,
                allowedTypes: ['image'],
                render: ({ open }) =>
                  React.createElement(
                    Button,
                    {
                      className:
                        mediaId === 0 ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview',
                      onClick: open,
                      style: { marginBottom: '1rem' },
                      variant: media && Object.keys(media).length ? '' : 'secondary'
                    },
                    media && Object.keys(media).length
                      ? media.url
                        ? React.createElement('img', { src: media.url, style: { maxWidth: '4.5rem' } })
                        : media.title
                      : __('Choose an image', 'tile-rich-text')
                  )
              }),
              media && Object.keys(media).length
                ? React.createElement(
                    Button,
                    {
                      onClick: () => {
                        setMediaId(0);
                        setMediaUrl('');
                        setAttributes({ media: {}, image: '' });
                      },
                      style: { display: 'block', width: '100%', textAlign: 'right', margin: '0.5rem 0' },
                      variant: 'link'
                    },
                    __('Remove image', 'tile-rich-text')
                  )
                : ''
            ),
            React.createElement(TextControl, {
              label: __('Title', 'tile-rich-text'),
              value: title,
              onChange: (e) => setAttributes({ title: e })
            }),
            React.createElement(
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
              __('Bullet Color', 'tile-rich-text')
            ),
            React.createElement(ColorPalette, {
              value: bulletColor || '',
              onChange: (color) => setAttributes({ bulletColor: color }),
              allowCustom: true,
              clearable: true,
              colors: bulletColors
            })
          )
        ),
        React.createElement(
          'div',
          useBlockProps(),
          React.createElement(
            'div',
            { style: { padding: '1rem', display: 'flex', alignItems: 'center' } },
            media && media.url
              ? React.createElement('img', {
                  style: { maxWidth: '2rem', marginRight: '1rem' },
                  src: media.url
                })
              : null,
            React.createElement('strong', { style: { fontSize: '16px', margin: 0 } }, title)
          ),
          React.createElement(
            'div',
            {
              className: 'tile-rich-text',
              style: {
                borderRadius: '4px',
                margin: '1rem',
                minHeight: '6em',
                border: '1px solid #ddd',
                padding: '8px'
              }
            },
            React.createElement(RichText, {
              tagName: 'div',
              className: 'tile-rich-text',
              value: description,
              onChange: (val) => setAttributes({ description: val }),
              allowedFormats: [
                'core/bold',
                'core/italic',
                'core/link',
                'core/underline',
                'core/strikethrough',
                'core/code'
              ],
              placeholder: __('Paste or type your rich text here (bold, italic, lists, etc.)', 'tile-rich-text'),
              style: {
                margin: 0
              }
            })
          )
        )
      );
    },
    save: function ({ attributes }) {
      const { media, title, description, bulletColor } = attributes;
      return React.createElement(
        'div',
        null,
        React.createElement(
          'style',
          null,
          bulletColor ? `.tile-rich-text ul li::marker { color: ${bulletColor}; }` : ''
        ),
        React.createElement(
          'div',
          {
            className: 'tile-rich-header',
            style: { padding: '1rem', width: '100%', display: 'flex', alignItems: 'center' }
          },
          media && media.url
            ? React.createElement('img', {
                style: { maxWidth: '2rem', marginRight: '1rem' },
                src: media.url
              })
            : null,
          React.createElement('strong', { style: { fontSize: '16px', margin: 0 } }, title)
        ),
        React.createElement(RichText.Content, {
          tagName: 'div',
          className: 'tile-rich-text',
          value: description
        })
      );
    }
  });
})();

export function createSeoPreview({
    metaTitle = '',
    metaDescription = '',
    robots = 'index, follow',
    defaultTitle = '',
    defaultDescription = '',
    replacements = {},
} = {}) {
    const interpolate = (value) => Object.entries(replacements).reduce(
        (result, [name, replacement]) => result.split(`{${name}}`).join(String(replacement)),
        String(value ?? ''),
    );

    return {
        metaTitle: String(metaTitle ?? ''),
        metaDescription: String(metaDescription ?? ''),
        robots: String(robots ?? 'index, follow'),

        get previewTitle() {
            return interpolate(this.metaTitle.trim() || defaultTitle);
        },

        get previewDescription() {
            return interpolate(this.metaDescription.trim() || defaultDescription);
        },

        get previewTitleLength() {
            return Array.from(this.previewTitle).length;
        },

        get previewDescriptionLength() {
            return Array.from(this.previewDescription).length;
        },

        get isNoindex() {
            return this.robots.includes('noindex');
        },
    };
}

let houseMixin = {
    wordReplace(str1, str2) {
        this.description = this.description.replace(str1, str2);
    },
    wordInsertAfter(str1, str2) {
        let len = this.description.indexOf(str1) + str1.length;
        this.description = [this.description.slice(0, len), " ", str2, this.description.slice(len)].join('');
    },
    wordDelete(str) {
        let lenBefore = this.description.indexOf(str);
        let lenAfter = this.description.indexOf(str) + str.length;
        this.description = [this.description.slice(0, lenBefore), this.description.slice(lenAfter)].join('');
    },
    wordEncrypt() {
        let input = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let output = 'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm';
        let index = x => input.indexOf(x);
        let translate = x => index(x) > -1 ? output[index(x)] : x;
        this.description = this.description.split('').map(translate).join('');
    },
    wordDecrypt() {
        let input = 'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm';
        let output = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'
        let index = x => input.indexOf(x);
        let translate = x => index(x) > -1 ? output[index(x)] : x;
        this.description = this.description.split('').map(translate).join('');
    }
}

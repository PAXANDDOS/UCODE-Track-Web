describe("checkBrackets", () => {
    it("case.Undefined",function() {
        assert.equal(checkBrackets(undefined), '-1')
    })
    it("case.Nan", () => assert.equal(checkBrackets(NaN), '-1'))
    it("case.String",function() {
        assert.equal(checkBrackets('string'), '-1')
    })
    it("case.Number",function() {
        assert.equal(checkBrackets(22), '-1')
    })
    it("case.NULL",function() {
        assert.equal(checkBrackets(null), '-1')
    })
    it("case { () }", function() {
        assert.equal(checkBrackets('()'), '0');
    });
    it("case { () )( }", function() {
        assert.equal(checkBrackets('() )('), '2');
    });
    it("case { ()()()()()()() }", function() {
        assert.equal(checkBrackets('()()()()()()()'), '0');
    });
    it("case { ()()string(string)) }", function() {
        assert.equal(checkBrackets('()()string(string))'), '1');
    });
    it("case { ()()()()() }", function() {
        assert.equal(checkBrackets('()()()()()'), '0');
    });
    it("case { ([ }", function() {
        assert.equal(checkBrackets('()()()()()()'), '0');
    });
    it("case { ((((((((((hey)))))))))) }", function() {
        assert.equal(checkBrackets('((((((((((hey))))))))))'), '0');
    });
    it("case { ( ( ( ( ( ( ( }", function() {
        assert.equal(checkBrackets('( ( ( ( ( ( ('), '7');
    });
    it("case { (1) (2) (3) (4) }", function() {
        assert.equal(checkBrackets('(1) (2) (3) (4)'), '0');
    });
    it("case { )1( )2( }", function() {
        assert.equal(checkBrackets(')1( )2('), '2');
    });
});

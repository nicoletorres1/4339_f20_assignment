package Fall20javaProg;

public class SomeClass {

    private char[] e; //char array containing input file characters
    private int i; //index of the current character
    char currentChar; //the actual current character

    public SomeClass(String s) {
        // constructor
        e = s.toCharArray();
        i = 0;
    }

    public String fetch() {
        // skip blanklike characters
        while (i < e.length && " \n\t\r".indexOf(e[i]) >= 0) {
            i++;
        }
        if (i >= e.length) {
            return "";
        }
        String inputString = "";
        while (i < e.length && "0123456789".indexOf(e[i]) >= 0) {
            inputString += e[i++];
        }
        if (!"".equals(inputString)) {
            return inputString;
        }
        while (i < e.length && "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_".indexOf(e[i]) >= 0) {
            inputString += e[i++];
        }
        if (!"".equals(inputString)) {
            return inputString;
        }
        return "%$#";
    }
}

public class Password {
    private String password_text;
    private int random_text;

    public Password(String password_text,int random_text) {
        this.password_text = password_text;
		this.random_text = random_text;
	}
    public void password_done() {
        System.out.println("password :" + this.password_text+this.random_text);
     }
	public void getInfo() {
		System.out.println("password text:"+this.password_text);
		System.out.println("random text:"+this.random_text);

    }
}
